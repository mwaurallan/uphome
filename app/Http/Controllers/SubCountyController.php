<?php

namespace App\Http\Controllers;

use App\SubCounty;
use Illuminate\Http\Request;

class SubCountyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $subcounties=SubCounty::paginate(25);

        return view('inventory.subcounty.index',compact('subcounties'));


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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubCounty  $subCounty
     * @return \Illuminate\Http\Response
     */
    public function show(SubCounty $subCounty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubCounty  $subCounty
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCounty $subCounty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubCounty  $subCounty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCounty $subCounty)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubCounty  $subCounty
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCounty $subCounty)
    {
        //
    }
}
