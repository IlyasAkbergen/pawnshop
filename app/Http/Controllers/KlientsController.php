<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\Klient;
use App\Zalog;

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

    public function zalogs($id){

        $zalogs = Zalog::where('klient_id', $id)->get();
        return view('klient', compact('zalogs'));
    }

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
}
