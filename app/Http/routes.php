<?php

Route::get('/', 'UsersController@show');

Route::auth();

Route::get('/workplace', 'UsersController@workplace')->name('workplace');

Route::get('/workplace/{klient}','UsersController@workplaceID');

Route::get('addUser', 'KlientsController@create');

Route::get('blanks', 'UsersController@getBlanks');

Route::get('/search','SearchController@search');

Route::post('klient/store', 'KlientsController@store');

Route::post('Zalogs/createWordDocx', 'ZalogsController@createWordDocx');

Route::get('/zalog/','ZalogsController@createZalog')->name('zalogForm');

Route::post('/addItem','ZalogsController@addItem');

Route::post('/addZalog','ZalogsController@addZalog');

Route::get('dd','UsersController@dd');

Route::get('/klients','UsersController@klients');

Route::get('/klient/{id}','UsersController@klient');

Route::get('/vykup/{id}','UsersController@vykup');

Route::get('/addOperationForm', function(){
	return view('addOperationForm');
})->name('addOperationForm');

Route::get('/closedSmenas', 'OperationsController@closedSmenas')->name('closedSmenas');

Route::get('/cashOperations', 'CashController@cashOperations')->name('cashOperations');

Route::get('/cash', 'CashController@show')->name('cashLayout');

Route::get('/cash/{id}', 'CashController@showbyid');

Route::get('/klient/{id}', 'KlientsController@zalogs');

Route::post('/addOperation', 'OperationsController@addOperation')->name('addOperation');

Route::get('/closeSmena', 'OperationsController@closeSmena')->name('closeSmena');
Route::get('/openSmena', 'OperationsController@openSmena')->name('openSmena');