<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Operation;
use App\User;
use App\Smena;
use App\Lombard;
use Auth;

class OperationsController extends Controller
{
	public function addOperation(Request $request){   
	
		$operation = new Operation();
		if($request->get('incash') !=== null){
			$operation->type = $request->get('type_operation') + 2;
		}else{
			$operation->type = $request->get('type_operation');
		}

		$operation->user_id = Auth::user()->id;
		$operation->sum = $request->get('sum');
		$operation->smena_id = Smena::where('user_id', Auth::user()->id)->where('status', 1)->first()->id;
		$operation->description = $request->get('description');
		$operation->save();

		$lombard = Lombard::where('user_id', Auth::user()->lombard_id)->first();
		if($request->get('type_operation') == 0){
			$lombard->bank = $lombard->bank + $request->get('sum');
		}else{
			$lombard->bank = $lombard->bank - $request->get('sum');
		}
		$lombard->save();

		return redirect('/workplace');
    }      
}
