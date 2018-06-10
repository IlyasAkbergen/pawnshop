<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Smena;
use App\Operation;
use App\Lombard;
use Auth;

class CashController extends Controller
{
    public function show(){
    	$currentSmena = Smena::where('user_id', Auth::user()->id)->where('status', 1)->first();
    	$smenas = Smena::where('user_id', Auth::user()->id)->get();

    	$plus = 0;
    	$minus = 0;
    	$bank = Lombard::find(Auth::user()->lombard_id)->bank;
    	if($currentSmena != null){
	    	$operations = Operation::where('smena_id', $currentSmena->id)->get();

	    	foreach ($operations as $operation) {
	    		if($operation->type == 0 || $operation->type == 2){
	    			$plus = $plus + $operation->sum;
	    		}else{
	    			$minus = $minus + $operation->sum;
	    		}
	    	}
    	}else{
    		$operations = "empty";
    	}

    	return view('cash', compact('smenas', 'operations', 'plus', 'minus', 'bank', 'currentSmena'));
    }
}
