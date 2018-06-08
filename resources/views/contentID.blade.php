@extends('layouts.layout')

@section('content')
<div class="container" id="main">
   <div class="row">
      
      <div class="col-sm-12" id="direct">
        <p><a>Главная </a>→Добавление новой операций</p>
         <h3>Добавление новых операций</h3>
      </div> 

      <div class="col-sm-12" id="action">
            <p > 
            <h3>
            <span class="glyphicon glyphicon-asterisk" id="required" aria-hidden="true"></span>Клиент:  
             {{Session::get('klient_name')}} {{Session::get('klient_surname')}}
            </h3>
            </p>
            <p style="padding-top: 2%"><a href="/zalog/"><button  id="marginbtn" type="button" class="btn btn-primary">Залог</button></a> <button type="button" class="btn btn-primary" id="marginbtn">Скупка</button> <button type="button" class="btn btn-primary" id="marginbtn">Приём на реализацию</button> <button type="button" class="btn btn-primary" id="marginbtn">Приём на ремонт</button> <button type="button" class="btn btn-primary">Покупка аксессуаров</button></p>
      </div>  
     
   </div>


 </div>

@endsection
