<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <script src="js/bootstrap.min.js"></script>
    <title>Внутренняя система ломбарда</title>

</head>
<body>
   <div class="container" id="fullpage">
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="img/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" role="form" method="POST" action="{{ url('/login') }} ">
            {{ csrf_field() }}
                <span id="reauth-email" class="reauth-email"></span>
                <input name ="email" type="text" id="inputEmail" class="form-control" placeholder="Логин" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                <input name ="password" type="password" id="inputPassword" class="form-control" placeholder="Пароль" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                <div id="remember" name="remember" class="checkbox">
                    <hr>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Вход</button>
            </form><!-- /form -->
           
        </div><!-- /card-container -->
    </div><!-- /container -->

</body>
</html>