<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Operation;
use App\User;
use App\Smena;
use App\Lombard;
use Carbon\Carbon;
use Auth;

class OperationsController extends Controller
{
	public function addOperation(Request $request){   
	
		$operation = new Operation();
		if($request->get('incash') !== null){
			$operation->type = $request->get('type_operation') + 2;
		}else{
			$operation->type = $request->get('type_operation');
		}
		
		$lombard = Lombard::where('user_id', Auth::user()->lombard_id)->first();

		$operation->user_id = Auth::user()->id;
		$operation->sum = $request->get('sum');
		$operation->smena_id = Smena::where('user_id', Auth::user()->id)->where('status', 1)->first()->id;
		$operation->description = $request->get('description');
		$operation->before = $lombard->bank;
		
		if( $operation->type == 0 || $operation->type == 2 ){
			$lombard->bank = $lombard->bank + $request->get('sum');
		}else{
			$lombard->bank = $lombard->bank - $request->get('sum');
		}
		$lombard->save();
		$operation->after = $lombard->bank;
		$operation->save();

		return redirect('/workplace');
    }      

    public function closeSmena(){

    	$smena = Smena::where('user_id', Auth::user()->id)->where('status', 1)->first();
    	$smena->ended_at = Carbon::now();
    	$smena->status = 0;
    	$smena->save();
    	return redirect('/workplace');

    }

    public function openSmena(){
    	$smena = new Smena();
    	$smena->user_id = Auth::user()->id;
    	$smena->started_at = Carbon::now();
    	$smena->status = 1;
    	$smena->before_cash = Lombard::where('user_id', Auth::user()->lombard_id)->first()->bank;
    	$smena->save();
    	return redirect('/cash');
    }
}