@extends('layouts.layout')

@section('style')
  <link rel="stylesheet" href="{{asset('css/vykup.css')}}">
@endsection

@section('content')

<div class="container" id="main">
   <div class="row">
      
      <div class="col-sm-12" id="direct">
        <p><a>Главная </a>→Клиенты</p>
         <h3>Выкуп</h3>
      </div> 

      <div class="col-sm-12" id="action">
       	<ul>
       	
       	<li><h4>Время окончание: {{$Zalogs->time}}</h4></li>
       	<li><h4>Коментарий: {{$Zalogs->comments}}</h4></li>
       	<li><h4>Создано: {{$Zalogs->created_at}}</h4></li>
       	<p><h4>Сумма к оплате: <input type="text" value="{{$Zalogs->price + 480}}" name=""/></h4></p>
       	<a href="/klients"><button>Сохранить</button></a>

       	 </ul>
      </div>  
     
   </div>


 </div>

@endsection
