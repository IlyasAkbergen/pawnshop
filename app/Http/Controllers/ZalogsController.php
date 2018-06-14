<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Session;
use Auth;
use App\Zalog;
use App\Klient;
use App\Good;
use App\Smena;
use App\Lombard;
use App\Operation;

class ZalogsController extends Controller
{
  public function createWordDocx(Request $request){
   	$klient_info = $request->get('name'). " " .$request->get('surname');
  	$phpWord = new \PhpOffice\PhpWord\PhpWord();
  	$section = $phpWord->addSection();
  	$section->addText(
    '"Оформление залога '
        . 'Клиент:" ' . $klient_info ." Продукт: " .$request->get('product_name') . "Сумма оценки" . $request->get('street') . "Дата сдачи:" . $request->get('date') 
        . '');
  	$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
  	try {
  	 	 $objWriter->save(storage_path('helloWorld.docx'));
  	} catch (Exception $e) {
  	 	
  	}
  	
    return response()->download(storage_path('helloWorld.docx'));
	
 }


  public function addItem(Request $request){   
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
    $storage = $request->get('storage');
    // return redirect(route('zalogForm'));
    return view('createZalog', compact('storage'));
  }
  
  public function addZalog(Request $request){   
    $zalog = new Zalog();
    $zalog->price = $request->get('sum');
    $zalog->time = $request->get('date');
    $zalog->klient_id  = $request->get('klient_id');
    $zalog->comments = $request->get('comment');
    $items = serialize(Session::get('Items'));
    $zalog->items = $items;
    $zalog->storage = $request->get('storage');
    $zalog->save();

    $items_array = array();
    $items_array = Session::get('Items');
    foreach( $items_array as $item ){
      $good = new Good;
      $good->title = $item['title'];
      $good->description = $item['description'];
      $good->klient_id = $request->get('klient_id');
      $good->zalog_id = $zalog->id;
      $good->price = $item['price'];
      $good->category = $item['category'];
      $good->serial_number = $item['serial_number'];
      $good->storage = $item['storage'];
      //$good->comment = $request->comment;
      $good->save();
    }

    $operation = new Operation();
    $operation->type = 3;
    
    $lombard = Lombard::where('user_id', Auth::user()->lombard_id)->first();

    $operation->user_id = Auth::user()->id;
    $operation->sum = $request->get('sum');
    $operation->smena_id = Smena::where('user_id', Auth::user()->id)->where('status', 1)->first()->id;
    $operation->description = "vydacha zaloga";
    $operation->before = $lombard->bank;
    $lombard->bank = $lombard->bank - $request->get('sum');
    $lombard->save();
    $operation->after = $lombard->bank;
    $operation->save();
    
    return view('blanks');
  }

  public function createZalog(){
    $storage = null;   
    return view('createZalog', compact('storage'));
  }

  public function vykupForm($id){   
    $zalog = Zalog::find($id);
    $klient = Klient::find($zalog->klient_id);
    return view('vykup',compact('zalog', 'klient'));
  }

  public function vykup(Request $request){

    $zalog = Zalog::find($request->get('zalog_id'));
    $zalog->status = 0;
    $zalog->save();
    // add operation

    $operation = new Operation();
    $operation->type = 2;
    
    $lombard = Lombard::where('user_id', Auth::user()->lombard_id)->first();

    $operation->user_id = Auth::user()->id;
    $operation->sum = $request->get('price');
    $operation->smena_id = Smena::where('user_id', Auth::user()->id)->where('status', 1)->first()->id;
    $operation->description = "vykup zaloga";
    $operation->before = $lombard->bank;
    $lombard->bank = $lombard->bank + $request->get('sum');
    $lombard->save();
    $operation->after = $lombard->bank;
    $operation->save();

    return redirect('klient/' . $request->get('klient_id'));
  }
}
