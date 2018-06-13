<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class GoodsController extends Controller
{
    public function store(Request $request){
    	if( !Auth::guest() ){
            $good = new Good;
            $good->title = $request->title;
            $good->description = $request->description;
            $good->klient_id = $request->klient_id;
            $good->price = $request->price;
            $good->category = $request->category;
            $good->serial_number = $request->serial_number;
            $good->storage = $request->storage;
            $good->commnet = $request->commnet;
            $good->save();

            return redirect(route('workplace'));
        }else{
            return redirect('/');
        }
    }
}
