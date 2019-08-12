<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MILOS - Minning Logistic System</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}">

    <link rel="stylesheet" href="{{ asset('ElaAdmin/assets/css/normalize.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ElaAdmin/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ElaAdmin/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ElaAdmin/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('ElaAdmin/assets/css/pe-icon-7-stroke.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ElaAdmin/assets/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ElaAdmin/assets/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('ElaAdmin/assets/css/style.css') }}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
</head>
<body class="bg-dark">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="{{ asset('images/logo.png') }}" alt="" width="300px" height="250px">
                    </a>
                </div>
                <div class="login-form">
                    <form class="form-horizontal m-t-20" id="loginform" action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Correo electrónico:</label>
                            <input type="email" class="form-control form-control-lg" placeholder="Correo electrónico" aria-label="Username" aria-describedby="basic-addon1" required="" name="email" value="{{ old('email') }}" autocomplete="email" autofocus="">
                        </div>
                        <div class="form-group">
                            <label>Contraseña:</label>
                            <input type="password" class="form-control form-control-lg" placeholder="Contraseña" aria-label="Password" aria-describedby="basic-addon1" required="" name="password" value="{{ old('password') }}" autocomplete="current-password">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Recuerdame
                            </label>
                            <label class="pull-right">
                                <a href="#">¿Olvidó su contraseña?</a>
                            </label>

                        </div>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Iniciar sesión</button>
                        <div class="register-link m-t-15 text-center">
                            <p>¿No tiene cuenta ? <a href="#"> Registrarse</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('ElaAdmin/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('ElaAdmin/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('ElaAdmin/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('ElaAdmin/assets/js/jquery.matchHeight.min.js') }}"></script>
    <script src="{{ asset('ElaAdmin/assets/js/main.js') }}"></script>

</body>
</html>
