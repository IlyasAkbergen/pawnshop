@extends('layouts.layout')

@section('content')
 <div class="container" id="main">
   <div class="row">
      
      <div class="col-sm-12" id="direct">
        <p><a>Главная </a>→Добавление нового клиента</p>
         <h3>Добавление нового клиента</h3>
      </div> 

      <div class="col-sm-12" id="action">
          {!! Form::open(['url' => 'klient/store']) !!}
           <p><h3>Фамилия:  <input type="text" name="surname"></h3></p>
           <p><h3>Имя:  <input type="text" name="name"></h3></p>
            <p><h3>Отчество:  <input type="text" name="patronomyc"></h3></p>
           <p><h3>Нас.пункт:  <input type="text" name="punkt"></h3></p>
           <p><h3>Дата рождение:  <input type="text" name="date_of_birth"></h3></p>
           <p><h3>Улица:  <input type="text" name="street"></h3></p>
           <p><h3>Дом:  <input type="text" name="home"></h3></p>
           
           <p><h3>Место рождение:  <input type="text" name="location_of_birth"></h3></p>
           <p><h3>Фактический адрес:  <input type="text" name="location_of_fact"></h3></p>
            <p><h3>Телефон:  <input type="text" name="phone"></h3></p>
           <!-- <p><input type="file" value="Загрузить документ" name="uploaded_file"></p> -->
           <button type="sumbit" class="btn btn-success">
            Сохранить и продолжить</button>
         {!! Form::close() !!}
      </div>  
   </div>


 </div>
@endsection


