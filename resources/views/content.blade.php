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
            <a data-toggle="modal" data-target="#chooseClient">Выбрать клиента</a> или
            <a href="{{ url('addUser') }}" >Добавить клиента</a>
            </h3>
            </p>
            <p style="padding-top: 2%"><button id="marginbtn" type="button" class="btn btn-primary" disabled="true">Залог</button> <button type="button" class="btn btn-primary" id="marginbtn" disabled="true">Скупка</button> <button type="button" class="btn btn-primary" id="marginbtn" disabled="true">Приём на реализацию</button> <button type="button" class="btn btn-primary" id="marginbtn" disabled="true">Приём на ремонт</button> <button type="button" class="btn btn-primary">Покупка аксессуаров</button></p>
      </div>  
   </div> 
        @if(Session::has('message'))
        <div class="alert" style="    width: 250px;
                                      height: 45px;
                                      background-color: #44de44;
                                      z-index: 999;
                                      text-align: center;
                                      color: white;
                                      margin-left: 79.5%">
         <p>{{Session::get('message')}}</p>
      </div>
      @endif
 </div>
 <!-- Modal For choosing Client -->
     <div id="chooseClient" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Выбор клиента</h4>
          </div>
          <div class="modal-body">
       
 
            <input type="text" class="form-controller" id="search" name="search"></input>
             
          
            <ul>
              @foreach ($klients as $klient)
               <a href="/workplace/{{$klient->id}}"><li>
              {{$klient->name }} {{$klient->surname }}
              </li></a>
              @endforeach
            </ul>
 
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>
   
    <!--END Modal For choosing Client -->
@endsection
