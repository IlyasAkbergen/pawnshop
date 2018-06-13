<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;
use Session;
use Auth;
Use App\Zalog;
Use App\Klient;
use mikehaertl\pdftk\Pdf;

class UsersController extends Controller
{
    public function show()
    {
        if(Auth::guest()){
            return view('login');
        }else{
            return redirect(route('workplace'));
        }
    }
    public function workplace()
    {   
        $klients = DB::table('klients')->get();

         
        return view('content',compact('klients'));
    }
    public function workplaceID($id)

    {   
    	 $klients = DB::table('klients')->find($id);


        Session::put('klient_name', $klients->name);
        Session::put('klient_surname',$klients->surname);

   		  return view('contentID');
    }
        
    public function dd(){   
         return response()->file('../temp/zalogoviy_bilet.pdf');
          // return stream('temp/zalogoviy_bilet.pdf');
    }
    public function getBlanks(){   

         return view('blanks');

    }

    public function klients(){   

         $klients = DB::table('klients')->get();


          return view('klients',compact('klients'));

    }

    public function klient($id){   
         $klients = DB::table('klients')->find($id);
         $Zalogs = DB::table('zalogs')->get();


          return view('klient',compact('klients'),compact('zalogs',$Zalogs));
    }
    public function vykup($id){   
         $Zalogs = DB::table('zalogs')->find($id);


          return view('vykup',compact('Zalogs'));
    }
}    