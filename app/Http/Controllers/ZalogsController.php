<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ZalogiController extends Controller
{
   public function createWordDocx(Request $request)
   {
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
}
