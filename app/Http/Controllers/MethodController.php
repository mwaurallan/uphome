<?php

namespace App\Http\Controllers;

use App\Admission;
use App\Service;
use Carbon\Carbon;
use App\Transaction;
use App\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        return view('methods.index', [
//            'methods' => PaymentMethod::paginate(15),
//            'month' => Carbon::now()->month
//        ]);
        $services=Service::all()->sortByDesc('id');
        // dd($services);

        // Category::all()->sortByDesc("created_at");
//        dd($services);
        return view('methods.create',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {

        return view('methods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{

if($request->service==11){

    $orders =DB::table('payments')
        ->join('bills', 'bills.id', '=', 'payments.order_id')
        ->join('bill__services','bill__services.order_id','=','bills.id')
        ->join('services','services.id','=','bill__services.product_id')
        ->select('payments.payment_date','payments.amount_paid', 'bills.customer_name','bill__services.product_id','services.name')
        ->whereBetween('payment_date',[$request->date1,$request->date2])->get();
        $total=$orders->sum('amount_paid');

}else{


    $orders =DB::table('payments')
        ->join('bills', 'bills.id', '=', 'payments.order_id')
        ->join('bill__services','bill__services.order_id','=','bills.id')
        ->join('services','services.id','=','bill__services.product_id')
        ->select('payments.payment_date','payments.amount_paid', 'bills.customer_name','bill__services.product_id','services.name')
        ->where('services.id',$request->service)
        ->whereBetween('payment_date',[$request->date1,$request->date2])->get();
        // dd($orders);

        $total=$orders->sum('amount_paid');
    }
        // dd($total);

//dd($total);

    return view('report.show',compact('orders','total'));
}
    public function receipt(Request $request, PaymentMethod $method)
    {
//        dd($request);
        $bills =DB::table('payments')
            ->where('id',$id)->get();
        $client_id=$bills[0]->customer_id;
        $order_id=$bills[0]->order_id;
        $clients=DB::table('admissions')->where('id',$client_id)->first();
        $pays=DB::table('bills')->where('id',$order_id)->first();
        $orders =DB::table('bill__services')
            ->join('services', 'services.id', '=', 'bill__services.product_id')
            ->select('bill__services.*', 'services.name')
            ->where('bill__services.order_id',$order_id)->get();
        $total=$orders->sum('quantity');
//        dd($total);

        return view('pay.receipt',compact('bills','clients','orders','pays','total'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd($id);
        Carbon::setWeekStartsAt(Carbon::SUNDAY);
        Carbon::setWeekEndsAt(Carbon::SATURDAY);

        $transactionname = [
            'income' => 'Income',
            'payment' => 'Payment',
            'expense' => 'Expense',
            'transfer' => 'Transfer'
        ];

        $balances = [
            'daily' => Transaction::whereBetween('created_at', [Carbon::now()->startOfDay(), Carbon::now()->endOfDay()])->sum('amount'),
            'weekly' => Transaction::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('amount'),
            'quarter' => Transaction::whereBetween('created_at', [Carbon::now()->startOfQuarter(), Carbon::now()->endOfQuarter()])->sum('amount'),
            'monthly' => Transaction::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->sum('amount'),
            'annual' => Transaction::whereBetween('created_at', [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()])->sum('amount'),
        ];

        return view('methods.show', [
            'method' => $method,
            'transactions' => Transaction::where('payment_method_id', $method->id)->latest()->paginate(25),
            'balances' => $balances,
            'transactionname' => $transactionname
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentMethod $method)
    {
        return view('methods.edit', compact('method'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentMethod $method)
    {
        $method->update($request->all());

        return redirect()
            ->route('methods.index')
            ->withStatus('Payment method updated satisfactorily.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentMethod $method)
    {
        $method->delete();

        return back()->withStatus('Payment method successfully removed.');
    }
}
