@extends('layouts.layout')

@section('style')

<link rel="stylesheet" href="{{asset('css/klient.css')}}">

@endsection

@section('content')

<div class="container" id="main">
   <div class="row">
      
      <div class="col-sm-12" id="direct">
        <p><a>Главная </a>→Клиенты</p>
         <h3>{{$klients->name}} {{$klients->surname}} </h3>
      </div> 

      <div class="col-sm-12" id="action">
          <div class="widget stacked widget-table action-table">
            
       
        
        <div class="widget-content">
          
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Наименование</th>
                
                <th class="td-actions">Действие</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Trident</td>
            
                <td class="td-actions">
                  <button>Перезалог</button>
                  <button>Добор</button>
             
                <button>Частичный выкуп</button>
                <button>Частичный выкуп2</button>
                    <a href="/vykup/1"> <button >Выкуп</button></a>
                  <button>Вывод из залога</button>
                </td>
              </tr>
              
              </tbody>
            </table>
          
        </div> <!-- /widget-content -->
      
      </div> <!-- /widget -->
      </div>  
     
   </div>


 </div>

@endsection
