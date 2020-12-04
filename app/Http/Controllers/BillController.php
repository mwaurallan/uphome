<?php

namespace App\Http\Controllers;

use App\Admission;
use App\Bill;
use App\Bill_Service;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products =Service::all();
        $clients=Admission::all();
        $bills=Bill::all();
        $bills =DB::table('bills')
            ->join('admissions', 'admissions.id', '=', 'bills.customer_email')
            ->select('bills.*', 'admissions.name','admissions.name_of_deceased')
            ->orderBy('id', 'desc')->get();

//        dd($bills);

        return view('payments.index', compact('products','bills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $clients=Admission::all();
        $products =Service::all();
        $bills=Bill::all();

        return view('payments.create', compact('clients','products','bills'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);
        $id=$request->customer_name;
        $client = DB::table('admissions')->where('id', $id)->first();
       $name=$client->name;
       $id2=$client->id;
        $total=0;
        $products = $request->input('products', []);
        $quantities = $request->input('quantities', []);
        foreach($quantities as $order)
        {
            $total += $order;
        }
        //dd($total);

         Bill::create([
             'customer_name'=>$name,
             'customer_email'=>$id2,
             'bill_total'=>$total,
             'bill_balance'=>$total,
             ]);

        $id2=Bill::latest()->first();
        $id2=$id2->id;

//        $products = $request->input('products', []);
//        $quantities = $request->input('quantities', []);

      //  for($i = 0;$i<count($products);$si++){
            for ($product=0; $product < count( $products); $product++){
               // for ($quantity=0;$quantity< count( $products); $quantity++) {
                    Bill_Service::create([
                        'order_id' => $id2,
                        'product_id' => $products[$product],
                        'quantity' => $quantities[$product]
                    ]);
        }


        return redirect()->route('services.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function show(Bill $bill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit(Bill $bill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bill $bill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bill $bill)
    {
        //
    }
}
