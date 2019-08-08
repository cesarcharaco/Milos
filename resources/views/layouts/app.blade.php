<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js" lang="es"> <!--<![endif]-->
<head>
    <title>MILOS - Minning Logistic System</title>

    @include('layouts.css')
    
    @yield('css')
</head>

<body>
    @include('layouts.sidebar')
    <div id="right-panel" class="right-panel">
        @include('layouts.header')
        @yield('content')
        @include('layouts.footer')
    </div>
    @include('layouts.scripts')
</body>
</html>
