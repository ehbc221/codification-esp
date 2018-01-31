<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="Bootstrap Admin App + jQuery">
        <meta name="keywords" content="app, responsive, jquery, bootstrap, dashboard, admin">
        <title>Angle - Bootstrap Admin Template</title>
        <!-- =============== VENDOR STYLES ===============-->
        <link href="{{ asset('angle/vendor/fontawesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <!-- SIMPLE LINE ICONS-->
        <link href="{{ asset('angle/vendor/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet">
        <!-- =============== BOOTSTRAP STYLES ===============-->
        <link href="{{ asset('angle/app/css/bootstrap.css') }}" rel="stylesheet" id="bscss">
        <!-- =============== APP STYLES ===============-->
        <link href="{{ asset('angle/app/css/app.css') }}" rel="stylesheet" id="maincss">
    </head>

    <body>
    <div class="wrapper">
        <div class="abs-center wd-xl">
            <!-- START panel-->
            <div class="text-center mb-xl">
                <div class="text-lg mb-lg">404</div>
                <p class="lead m0">Nous ne pouvons pas trouver cette page.</p>
                <p>La page que vous recherchez n'éxiste pas.</p>
            </div>
            <ul class="list-inline text-center text-sm mb-xl">
                <li><a href="{{ route('accueil') }}" class="text-muted">Aller à l'accueil</a>
                </li>
                <li class="text-muted">|</li>
                <li><a href="{{ route('login') }}" class="text-muted">Se Connecter</a>
                </li>
                <li class="text-muted">|</li>
                <li><a href="{{ route('register') }}" class="text-muted">S'Inscrire</a>
                </li>
            </ul>
            <div class="p-lg text-center">
                @include('admin.sections.footer')
            </div>
        </div>
    </div>
    <!-- =============== VENDOR SCRIPTS ===============-->
    <!-- MODERNIZR-->
    <script src="{{ asset('angle/vendor/modernizr/modernizr.js') }}"></script>
    <!-- JQUERY-->
    <script src="{{ asset('angle/vendor/jquery/dist/jquery.js') }}"></script>
    <!-- BOOTSTRAP-->
    <script src="{{ asset('angle/vendor/bootstrap/dist/js/bootstrap.js') }}"></script>
    <!-- STORAGE API-->
    <script src="{{ asset('angle/vendor/jQuery-Storage-API/jquery.storageapi.js') }}"></script>
    <!-- PARSLEY-->
    <script src="{{ asset('angle/vendor/parsleyjs/dist/parsley.min.js') }}"></script>
    <!-- =============== APP SCRIPTS ===============-->
    <link href="{{ asset('angle/app/css/app.css') }}" rel="stylesheet" id="maincss">
    </body>

</html>