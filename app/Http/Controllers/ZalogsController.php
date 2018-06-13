<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Session;
use Auth;
Use App\Zalog;
Use App\Klient;

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
    $zalog->price = $request->get('summ');
    $zalog->time = $request->get('date');
    $zalog->klient_id  = 1;
    $zalog->comments = $request->get('comment');
    $res = serialize(Session::get('Items'));
    $zalog->items = $res;
    $zalog->storage = $request->get('storage');
    $zalog->save();
    
    return view('blanks');
  }

  public function createZalog(){
    $storage = null;   
    return view('createZalog', compact('storage'));
  }
}
