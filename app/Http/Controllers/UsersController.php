<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;
use Session;
Use App\Zalog;
Use App\Klient;
use mikehaertl\pdftk\Pdf;

class UsersController extends Controller
{
    public function show()
    {
        return view('login');
    }
    public function workplace()
    {   
        $klients =DB::table('klients')->get();

         
        return view('content',compact('klients'));
    }
    public function workplaceID($id)

    {   
    	 $klients = DB::table('klients')->find($id);


        Session::put('klient_name', $klients->name);
        Session::put('klient_surname',$klients->surname);

   		  return view('contentID');
    }
        
    public function createZalog()
    {   
    	return view('createZalog');
    }
      public function dd()

    {   
        
        
         return response()->file('../temp/zalogoviy_bilet.pdf');
          // return stream('temp/zalogoviy_bilet.pdf');
    }
    public function getBlanks()

    {   



         return view('blanks');

    }
       public function addItem(Request $request)

        {   
           
            
            $Item = $request->all();
            //dd($Item);
            // dd(Session::get('Items'));
            Session::keep('Items','array');
            if(Session::has('Items')){
                Session::push('Items',$Item);
                // dd(Session::get('Items'));
            }else{
                Session::push('Items',$Item);
            }          
                  // Session::forget('Items');
            $arr_temp = Session::get('Items');
            //dd($arr_temp);
            // foreach($arr_temp as $brand => $massiv)
            //     dd($brand);
            // }
                            
            // print_r($arr_temp);
            // return view('createZalog',['Items'=>Session::get('Items')]);

            return view('createZalog');
        }
          public function addZalog(Request $request)

        {   
           
                       
            $Zalogi = new Zalog();
             $Zalogi->price = $request->get('summ');
             $Zalogi->time = $request->get('date');
             $Zalogi->klient_id  = 1;
             $Zalogi->comments = $request->get('comment');
             $res = serialize(Session::get('Items'));
             $Zalogi->items = $res;
             $Zalogi->save();
            
            return view('blanks');
        }
         public function klients()

    {   

         $klients = DB::table('klients')->get();


          return view('klients',compact('klients'));

    }
     public function klient($id)

    {   
         $klients = DB::table('klients')->find($id);
         $Zalogs = DB::table('zalogs')->get();


          return view('klient',compact('klients'),compact('zalogs',$Zalogs));
    }
    public function vykup($id)

    {   
         $Zalogs = DB::table('zalogs')->find($id);


          return view('vykup',compact('Zalogs'));
    }
    } 