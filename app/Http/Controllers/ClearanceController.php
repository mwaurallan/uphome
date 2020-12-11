<?php

namespace App\Http\Controllers;

use App\Clearance;
use App\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        $clients = Clearance::all();

        return view('clearance.index', compact('clients'));
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

//        dd($request);
        $curr_date=$request->date_admitted;
        $curr_date=Carbon::now();

//
//        dd($cur_date);
//        $admit = new Admission();
        $admit= new Clearance();
//        $user=Auth::user()->name;
        $user=Auth::user()->name;
        $admit->name_of_deceased = $request->name_of_deceased;
        $admit->adm_no= $request->adm_no;
        $admit->next_of_kin = $request->name;
        $admit->id_no= $request->id_no;
        $admit->permit_no = $request->permit_no;
        $admit->county = $request->county;
        $admit->subcounty = $request->subcounty;
        $admit->location= $request->location;
        $admit->village = $request->village;
        $admit->nearest_centre = $request->nearest_centre;
        $admit-> nearest_police= $request->nearest_police;
        $admit-> witness= $request->witness;
        $admit-> witness_id= $request->witness_id;
        $admit-> auth_officer= $request->auth_officer;
        $admit-> release_officer= $request->release_officer;
        $admit-> release_date= $request->release_date;
        $admit->rct_no=$request->rct_no;
        $admit->save();
        return redirect()
            ->route('clearance.index')
            ->withStatus('Clearance successfully registered.');
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
    public function print5( $id)
    {
        //
//        dd($id);
        $admins=DB::table('admissions')->where('id',$id)->first();

//     dd($admins);
        return view('uphome.show', compact('admins'));
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
