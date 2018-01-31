<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="Codification ESP">
        <meta name="keywords" content="ESP, UCAD, codification, université">
        <title>{{ config('APP_NAME', 'Codification ESP') }} | {{ $controller_name or 'Composant' }} - {{ $action_name or 'Action' }}</title>
        <!-- =============== VENDOR STYLES ===============-->
        <!-- FONT AWESOME-->
        <link href="{{ asset('angle/vendor/fontawesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <!-- SIMPLE LINE ICONS-->
        <link href="{{ asset('angle/vendor/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet">
        <!-- ANIMATE.CSS-->
        <link href="{{ asset('angle/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
        <!-- WHIRL (spinners)-->
        <link href="{{ asset('angle/vendor/whirl/dist/whirl.css') }}" rel="stylesheet">
        <!-- SWEETALERT-->
        <link href="{{ asset('angle/vendor/sweetalert/dist/sweetalert.css') }}" rel="stylesheet">
        <!-- =============== PAGE VENDOR STYLES ===============-->
        <!-- =============== BOOTSTRAP STYLES ===============-->
        <link href="{{ asset('angle/app/css/bootstrap.css') }}" rel="stylesheet" id="bscss">
        <!-- =============== APP STYLES ===============-->
        <link href="{{ asset('angle/app/css/app.css') }}" rel="stylesheet" id="maincss">
        <!-- CUSTOM CSS -->
        @stack('styles')
    </head>

    <body class="layout-h">
        <div class="wrapper">
        <!-- top navbar-->
        @include('student.sections.header')
        <!-- Main section-->
            <section>
                <!-- Page content-->
                <div class="content-wrapper">
                    <h3>{{ $controller_name or 'Composant' }}
                        <small>{{ $action_name or 'Action' }}</small>
                    </h3>
                    <div class="row">
                        <div class="col-lg-12">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </section>
            <!-- Page footer-->
            @include('student.sections.footer')
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
        <!-- JQUERY EASING-->
        <script src="{{ asset('angle/vendor/jquery.easing/js/jquery.easing.js') }}"></script>
        <!-- ANIMO-->
        <script src="{{ asset('angle/vendor/animo.js/animo.js') }}"></script>
        <!-- SLIMSCROLL-->
        <script src="{{ asset('angle/vendor/slimScroll/jquery.slimscroll.min.js') }}"></script>
        <!-- SCREENFULL-->
        <script src="{{ asset('angle/vendor/screenfull/dist/screenfull.js') }}"></script>
        <!-- LOCALIZE-->
        <script src="{{ asset('angle/vendor/jquery-localize-i18n/dist/jquery.localize.js') }}"></script>
        <!-- RTL demo-->
        <script src="{{ asset('angle/app/js/demo/demo-rtl.js') }}"></script>
        <!-- SWEET ALERT -->
        <script src="{{ asset('angle/vendor/sweetalert/dist/sweetalert2.all.min.js') }}"></script>
        <!-- =============== PAGE VENDOR SCRIPTS ===============-->
        <!-- =============== APP SCRIPTS ===============-->
        <script src="{{ asset('angle/app/js/app.js') }}"></script>
        <script src="{{ asset('js/scripts.js') }}"></script>
        <!-- CUSTOM JS -->
        @stack('scripts')
</body>

</html>