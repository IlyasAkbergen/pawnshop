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

Route::get('/zalog/','UsersController@createZalog');

Route::post('/addItem','UsersController@addItem');

Route::post('/addZalog','UsersController@addZalog');

Route::get('dd','UsersController@dd');

Route::get('/klients','UsersController@klients');

Route::get('/klient/{id}','UsersController@klient');

Route::get('/vykup/{id}','UsersController@vykup');

