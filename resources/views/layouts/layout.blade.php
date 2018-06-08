<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    
   <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
   <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
   <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
  <!-- <script type="text/javascript" src="{{ URL::asset('js/bootstrap.js') }}"></script> -->


    <!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->

     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  
    <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js')}}"></script>
  
  

	<title>Внутренняя система ломбарда</title>
  <style type="text/css">
    body{
      background-color: #edeef0;
      font-family: 'Roboto', sans-serif;
    }
  </style>

   @yield('style')

</head>
<body>
   <div class="container" id="header">
        <div class="col-sm-6">
            <p><h1 style="color:#186999; font-weight:bold; font-family:'Trebuchet MS",Arial,Helvetica,sans-serif'; ">Внутренняя система ломбарда</h1></p>
        </div>
        <div class="col-sm-2">
            
        </div>
           <div class="col-sm-4">
             <img src="{{ URL::asset('img/avatar_2x.png') }}"  style="float: left;width: 18%;border-radius: 50%;">
             <ul style="float: left;font-size: 0.9em;">
               <li style="list-style-type: none;"> {{ Auth::user()->email }}</li>
               <li style="list-style-type: none;">Уровень доступа</li>
               <li style="list-style-type: none;"><a>Управление</a></li>
               <li style="list-style-type: none;"><a href="{{ url('/logout') }}">Выход</a></li>

             </ul>
        </div>
    </div><!-- /container -->
    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
     
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Главная <span class="sr-only">(current)</span></a></li>
      
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Касса <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Главная</a></li>
            <li><a href="#">Касса</a></li>
            <li><a href="#">Каталог</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Каталог <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Главная</a></li>
            <li><a href="#">Касса</a></li>
            <li><a href="#">Каталог</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
          <li><a href="#">Журнал</a></li>
          <li><a href="/klients">Клиенты</a></li>
             <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Еще <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Главная</a></li>
            <li><a href="#">Касса</a></li>
            <li><a href="#">Каталог</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
        <li><a href="#"><b>+Добавить операцию</b></a></li>
      </ul>
      <form class="navbar-form navbar-left" style="padding-left: 20%;">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Поиск в системе..">
        </div>
        <button type="submit" class="btn btn-default">Выполнить</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
     
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
  
  @yield('content')
  
  @yield('script')

</body>
</html>