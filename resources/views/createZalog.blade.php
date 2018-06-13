@extends('layouts.layout')

@section('style')
<style type="text/css">
  #mobile{
    display: none;
  }
  #computer{
    display: none;
  }
</style>
@endsection

@section('content')
<script type="text/javascript">
  $(function(){
        $('#opt_ph').change(function(){
         var choice = $('#opt_ph').val();
          if(choice == "2"){
            document.querySelector('#mobile').style.display = "block";
            document.querySelector('#computer').style.display = "none";
            
          }else if(choice =="5"){
            document.querySelector('#computer').style.display = "block";
              document.querySelector('#mobile').style.display = "none";
       
          }
          else if(choice =="unknown"){
            document.querySelector('#computer').style.display = "none";
            document.querySelector('#mobile').style.display = "none";
          }
    })
});
</script>
 <div class="container" id="main">
   <div class="row">
      
      <div class="col-sm-12" id="direct">
        <p><a>Главная </a>→Добавление нового клиента</p>
         <h3>Оформить залог на <a>{{Session::get('klient_name')}} {{Session::get('klient_surname')}}</a></h3>
      </div> 

            {!! Form::open(['url' => 'addZalog']) !!}
      <div class="col-sm-12" id="action">
      
            <a data-toggle="modal" data-target="#addItem">Добавить имущество</a>
           <p><h3>Залоговое имущество:</h3></p>
           <p style="background-color: #96c7ec;
    width: 10%;"><i><b>
          @if(Session::has('Items'))
            
            <?php 
              $items = array();
              $items = Session::get('Items');

            ?>

            @foreach( $items as $item)
              <i>{{ $item["title"] }}</i>
            @endforeach

          @else
            <p>empty</p>
          @endif

    <ul>
   
    </ul>
    </b> сумма 10000тг</i></p>
           <p><h3>Срок займа,дней: <input type="text" name="date"></h3></p>
           <p><h3>Сумма займа:  <input type="text" name="summ"></h3></p>
            <p><h3>Коментарий:  <textarea style="width: 35%;" class="form-control" rows="3" id="comment" name="comment"></textarea></h3></p>
           <p></p>
           <!-- <p><input type="file" value="Загрузить документ" name="uploaded_file"></p> -->
            <input type="hidden" name="storage" value="{{$storage}}">
           <button type="sumbit" class="btn btn-success">
            Сохранить и продолжить</button>
      </div>  
             {!! Form::close() !!} 

   </div>


 </div>
 <!-- Modal For choosing Client -->
     <div id="addItem" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Выбор клиента</h4>
          </div>
          <div class="modal-body">
        
         
          <div class="form-group">
            <label class="col-md-3 control-label" for="podcategory">Категория</label>  
            <div class="col-md-5">
              <?php $categories = App\Category::all(); ?>
              <select id="opt_ph" name="category">
                <option value="unknown">Выберите категорию</option>
                @foreach($categories as $category)
                <option value="{{$category->code}}">{{$category->title}}</option>
                @endforeach
              <select>
            </div>
          </div>
          <br><br>
          <div id="mobile">
           {!! Form::open(['url' => 'addItem']) !!}
              <div class="form-group" >
                <label class="col-md-3 control-label" for="title">Наименование</label>  
                <div class="col-md-5">
                <input id="action_name" name="title" type="text" placeholder="" class="form-control input-md">
                  
                </div>
              </div>
              <br><br>

              <div class="form-group" >
                <label class="col-md-3 control-label" for="serial_number">Серийный номер</label>  
                <div class="col-md-5">
                <input id="action_name" name="serial_number" type="text" placeholder="" class="form-control input-md">
                  
                </div>
              </div>
              <br><br>

              <div class="form-group" >
                <label class="col-md-3 control-label" for="price">Сумма оценки , тг</label>  
                <div class="col-md-5">
                <input id="action_name" name="price" type="text" placeholder="" class="form-control input-md">
                  
                </div>
              </div>
              <br><br>

              <div class="form-group" >
                <label class="col-md-3 control-label" for="storage">Место хранения</label>  
                <div class="col-md-5">
                <select name="storage">
                  <option value="1">Склад</option>
                  <option value="2">Сейф</option>
                  <option value="3">Автостоянка</option>
                </select>
                  
                </div>
              </div>
              <br><br>

      

              <div class="form-group" >
                 <label class="col-md-4 control-label" for="description">Описание:</label>
                  <div class="col-md-5">
                <textarea class="form-control" rows="5" id="description" class="form-control input-md" name="description"></textarea>
                </div>
              </div>
              <br><br>

              <div class="form-group" >
                 <label class="col-md-4 control-label" for="comments">Коментарий:</label>
                  <div class="col-md-5">
                <textarea class="form-control" rows="5" id="comment" class="form-control input-md" name="comments"></textarea>
                </div>
              </div>
          <button type="sumbit">Добавить</button>  
            {!! Form::close() !!} 
              </div>
              
          <div id="computer">
          {!! Form::open(['url' => 'addItem']) !!}
             <div class="form-group" >
                <label class="col-md-3 control-label" for="name">Наименование</label>  
                <div class="col-md-5">
                  <input id="action_name" name="title" type="text" placeholder="" class="form-control input-md">
                </div>
              </div>
              <br><br>

              <div class="form-group" >
                <label class="col-md-3 control-label" for="serial_number">Серийный номер</label>  
                <div class="col-md-5">
                <input id="action_name" name="serial_number" type="text" placeholder="" class="form-control input-md">
                  
                </div>
              </div>
              <br><br>

              <div class="form-group" >
                <label class="col-md-3 control-label" for="price">Сумма оценки , тг</label>  
                <div class="col-md-5">
                <input id="action_name" name="price" type="text" placeholder="" class="form-control input-md">
                  
                </div>
              </div>
              <br><br>

              <div class="form-group" >
                <label class="col-md-3 control-label" for="location">Место хранения</label>  
                <div class="col-md-5">
                <select name="storage">
                <option value="sklad">Склад</option>
                <option value="seif">Сейф</option>
                <option value="avtostoyanka">Автостоянка</option>
                
              </select>
                  
                </div>
              </div>
              <br><br>

      

              <div class="form-group" >
                 <label class="col-md-4 control-label" for="description">Описание:</label>
                  <div class="col-md-5">
                <textarea class="form-control" rows="5" id="comment" class="form-control input-md" name="description"></textarea>
                </div>
              </div>
              <br><br>

              <div class="form-group" >
                 <label class="col-md-4 control-label" for="comments">Коментарий:</label>
                  <div class="col-md-5">
                <textarea class="form-control" rows="5" id="comment" class="form-control input-md" name="comments"></textarea>
                </div>
              </div>
            <button type="sumbit">Добавить</button>   
          {!! Form::close() !!}

          </div>    
                       
      
          </div>
          <div class="modal-footer">
         
          </div>
        </div>

      </div>
    </div>
@endsection


