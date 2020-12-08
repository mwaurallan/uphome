<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    //
    public function payment(Request $request)
    {
        dd($request);

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
        if($request->amount_paid == $bills->bill_balance)
        {
            $bal=$bills->bill_balance-$request->amount_paid;
        }
        else
        {
            $bal=$bills->bill_balance-$request->amount_paid;
        }
        $affected = DB::table('bills')
            ->where('id', $request->order_id)
            ->update(['amount_paid' =>$request->amount_paid +$current,'bill_balance'=>$bal]);
        $pay=Payment::latest()->first();
        $id=$pay->id;



        return redirect("print3/{$id}");


    }

}
