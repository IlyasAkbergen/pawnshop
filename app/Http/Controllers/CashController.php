<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Smena;
use App\Operation;
use App\Lombard;
use App\User;
use Auth;

class CashController extends Controller
{
    public function show(){
    	$currentSmena = Smena::where('user_id', Auth::user()->id)->where('status', 1)->first();
    	$smenas = Smena::where('user_id', Auth::user()->id)->get();

    	$plus = 0;
    	$minus = 0;
    	$dohod = 0;
    	$zatraty = 0;
    	$bank = Lombard::find(Auth::user()->lombard_id)->bank;
    	if($currentSmena != null){
	    	$operations = Operation::where('smena_id', $currentSmena->id)->get(); // рассмотреть вариант без этого массива, мб поражняковый

	    	foreach ($operations as $operation) {
	    		if($operation->type == 0 || $operation->type == 2){
	    			$plus = $plus + $operation->sum;
	    			if($operation->type == 2){
	    				$dohod = $dohod + $operation->sum;
	    			}
	    		}else{
	    			$minus = $minus + $operation->sum;
	    			if($operation->type == 3){
	    				$zatraty = $zatraty + $operation->sum;
	    			}
	    		}
	    	}

			$ins = Operation::where('smena_id', $currentSmena->id)->where(function($q) {
															          $q->where('type', 0)
															            ->orWhere('type', 2);
															      })->get();
    		
			$outs = Operation::where('smena_id', $currentSmena->id)->where(function($q) {
															          $q->where('type', 1)
															            ->orWhere('type', 3);
															      })->get();
    	}else{
    		$operations = "empty";
    	}


    	return view('cash', compact('smenas', 'operations', 'plus', 'minus', 'bank', 'currentSmena', 'ins', 'outs', 'dohod', 'zatraty'));
    }

    public function showbyid($id){
    	$currentSmena = Smena::find($id);
    	$smenas = Smena::where('user_id', Auth::user()->id)->get();

    	$plus = 0;
    	$minus = 0;
    	$dohod = 0;
    	$zatraty = 0;
    	$bank = Lombard::find(Auth::user()->lombard_id)->bank;
    	if($currentSmena != null){
	    	$operations = Operation::where('smena_id', $currentSmena->id)->get(); // рассмотреть вариант без этого массива, мб поражняковый

	    	foreach ($operations as $operation) {
	    		if($operation->type == 0 || $operation->type == 2){
	    			$plus = $plus + $operation->sum;
	    			if($operation->type == 2){
	    				$dohod = $dohod + $operation->sum;
	    			}
	    		}else{
	    			$minus = $minus + $operation->sum;
	    			if($operation->type == 3){
	    				$zatraty = $zatraty + $operation->sum;
	    			}
	    		}
	    	}

			$ins = Operation::where('smena_id', $currentSmena->id)->where(function($q) {
															          $q->where('type', 0)
															            ->orWhere('type', 2);
															      })->get();
    		
			$outs = Operation::where('smena_id', $currentSmena->id)->where(function($q) {
															          $q->where('type', 1)
															            ->orWhere('type', 3);
															      })->get();
    	}else{
    		$operations = "empty";
    	}


    	return view('cash', compact('smenas', 'operations', 'plus', 'minus', 'bank', 'currentSmena', 'ins', 'outs', 'dohod', 'zatraty'));
    }

    public function cashOperations(){

    	$employees = User::where('type', 2)->where('lombard_id', Auth::user()->lombard_id)->get();
    	$sum = 0;
    	$operations = Operation::where('lombard_id', Auth::user()->lombard_id)->get();
    	foreach ($operations as $operation) {
    		$sum = $sum + $operation->sum;
    	}
    	return view('cashOperations', compact('employees', 'operations', 'sum'));
    }
}
