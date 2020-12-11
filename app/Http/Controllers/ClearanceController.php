<?php

namespace App\Http\Controllers;

use App\Clearance;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClearanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function print($id)
    {
        //
//        dd($id);
        $counties= array(
            1 => 'NAIROBI', 2 => 'KISUMU', 3 => 'KIAMBU');

        $subcounties= array(
            1 => 'LIMURU', 2 => 'KIKUYU', 3 => 'LARI','GITHUNGURI');


        $admins=DB::table('bills')->where('id',$id)->first();
//       $pay= Payment::query()
//            ->where('customer_id', '=', $id)
//           ->latest('id')
//           ->first()
//           ->get();
        $results = Payment::latest('id')
            ->where('customer_id','=',$id)->first();
//       dd($results->id);
        $rct_id=$results->id;

        $bills =DB::table('admissions')
            ->where('admissions.id',$id)->get();

//     dd($bills);

        return view('clearance.create', compact('admins','bills','counties','subcounties','rct_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\
     * Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Clearance  $clearance
     * @return \Illuminate\Http\Response
     */
    public function show(Clearance $clearance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Clearance  $clearance
     * @return \Illuminate\Http\Response
     */
    public function edit(Clearance $clearance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Clearance  $clearance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clearance $clearance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clearance  $clearance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clearance $clearance)
    {
        //
    }
}
