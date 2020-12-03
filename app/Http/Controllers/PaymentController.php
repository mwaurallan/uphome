<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Bill_Service;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clients=Admission::all();
        $products =Service::all();
        $bills=Bill::all();

        return view('payments.create', compact('clients','products','bills'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }
    public function print( $id)
    {
        //

        $admins=DB::table('bills')->where('id',$id)->first();
//       dd($admins);
       // $bills=DB::table('bill__services')->where('order_id',$id)->get();
//     //   $bills=Bill_Service::select('bill__services.*')->where('order_id',$id)
//        //    ->join('services','services.id','=','product_id')->get();
//        dd($bills);
//        $admins=Bill::select('bills.*')
//            ->join('bill__services','bill__services.order_id','=','bills.id')
//            ->join('services','services.id','=','bill__services.product_id')
//            ->where('bills.id',$id)->get();
        $bills =DB::table('bill__services')
            ->join('services', 'services.id', '=', 'bill__services.product_id')
            ->select('bill__services.*', 'services.name')
            ->where('bill__services.order_id',$id)->get();

//     dd($bills);
        return view('pay.create', compact('admins','bills'));
    }
    public function display($id)
    {
        //

        $admins=DB::table('admissions')->where('id',$id)->first();
        dd($admins);


//     dd($admins);
        return view('pay.create', compact('admins'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
//        dd($request);

        $admit = new Payment();
        $var = $request->payment_date;
        $var= date("Y-m-d",strtotime($var));
        $admit->order_id=$request->order_id;
        $admit->customer_id=$request->customer_email;
        $admit->payment_date=$var;
        $admit->amount_paid=$request->amount_paid;
        $admit->save();

        $bills =DB::table('bills')->where('id',$request->order_id)->first();
        $current=$bills->amount_paid;
        if($request->amount_paid == $bills->bill_total)
        {
            $bal=$bills->bill_total-$request->amount_paid;
        }
        else
        {
          $bal=$bills->bill_total-$request->amount_paid;
//          dd($bal);
        }
//      dd($bal);

        $affected = DB::table('bills')
            ->where('id', $request->order_id)
            ->update(['amount_paid' =>$request->amount_paid +$current,'bill_balance'=>$bal]);

        // $model->create($request->all());

        return redirect()
            ->route('admission.index')
            ->withStatus('Admission successfully registered.');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}