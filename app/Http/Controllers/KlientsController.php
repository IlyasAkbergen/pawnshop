<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

Use App\Klient;
class klientsController extends Controller
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
        return view('addUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $klients = new Klient();
         $klients->name = $request->get('name');
         $klients->surname = $request->get('surname');
         $klients->patronymic  = $request->get('patronomyc');
         $klients->date_of_birth = $request->get('date_of_birth');
         $klients->punkt = $request->get('punkt');
         $klients->street = $request->get('street');
         $klients->home = $request->get('home');
         $klients->location_of_birth = $request->get('location_of_birth');
         $klients->location_of_fact = $request->get('location_of_fact');
         $klients->phone = $request->get('phone');
        
         $klients->save();
         return redirect()->route('workplace')->with('message','Клиент успешно добавлен!');
    }
   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
