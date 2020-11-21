<?php

namespace App\Http\Controllers;

use App\Admission;
use App\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Admission::all();
     //   $clients= DB::table('admissions');
      //$clients=  DB::table('admisions');
       // dd($clients);

        //dd($clients);
      //  return view('games', [
         //   'games' => ['Castlevania', 'Galaga', 'Ghosts n Goblins'];

          //  $games=array(['nairobi','kisumu']); $cars= array(1 => 'one', 2 => 'two', 3 => 'three');
        //$cars = array("Volvo", "BMW", "Toyota");

        //dd($cars);

        return view('uphome.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories =ProductCategory ::all();
        $cars= array(1 => 'NAIROBI', 2 => 'KISUMU', 3 => 'MOMBASAA');

        return view('uphome.create', compact('categories','cars'));
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
        $admit = new Admission();

        $admit->name_of_deceased = $request->name_of_deceased;
        $admit->name = $request->name_of_deceased;
        $admit->id_no= $request->id_no;
        $admit->home_area = $request->home_area;
        $admit->tel_no = $request->tel_no;
        //$admit->date_admitted= $request->date_admitted;
        $admit->date_admitted=date('y-m-d',strtotime($request->date_admitted));
        $admit->permit_no = $request->permit_no;
        $admit->relationship = $request->relationship;
      //  $data['birthday'] = date('Y-m-d', strtotime($data['birthday']));

        $admit->save();

       // $model->create($request->all());

        return redirect()
            ->route('admission.index')
            ->withStatus('Admission successfully registered.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admission  $admission
     * @return \Illuminate\Http\Response
     */
    public function show(Admission $admission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admission  $admission
     * @return \Illuminate\Http\Response
     */
    public function edit(Admission $admission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admission  $admission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admission $admission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admission  $admission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admission $admission)
    {
        //
    }
}
