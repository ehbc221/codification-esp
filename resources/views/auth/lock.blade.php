<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="Bootstrap Admin App + jQuery">
        <meta name="keywords" content="app, responsive, jquery, bootstrap, dashboard, admin">
        <title>{{ config('app.name') }} - Connexion</title>
        <!-- =============== VENDOR STYLES ===============-->
        <!-- FONT AWESOME-->
        <link href="{{ asset('angle/vendor/fontawesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <!-- SIMPLE LINE ICONS-->
        <link href="{{ asset('angle/vendor/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet">
        <!-- SWEETALERT-->
        <link href="{{ asset('angle/vendor/sweetalert/dist/sweetalert.css') }}" rel="stylesheet">
        <!-- =============== BOOTSTRAP STYLES ===============-->
        <link href="{{ asset('angle/app/css/bootstrap.css') }}" rel="stylesheet" id="bscss">
        <!-- =============== APP STYLES ===============-->
        <link href="{{ asset('angle/app/css/app.css') }}" rel="stylesheet" id="maincss">
    </head>

    <body>
        <div class="wrapper">
            <div class="abs-center wd-xl">
                <!-- START panel-->
                <div class="p">
                    <img src="{{ asset('angle/app/img/user/user.jpg') }}" alt="Avatar" width="60" height="60" class="img-thumbnail img-circle center-block">
                </div>
                <div class="panel widget b0">
                    <div class="panel-body">
                        <p class="text-center">Connectez vous pour déverouiller votre session.</p>

                        {!! Form::open(['route' => 'lock.post', 'method' => 'post', 'role' => 'form']) !!}
                        {!! Form::token() !!}

                            <div class="form-group has-feedback  {{ session('error') ? ' has-error' : '' }}">
                                {!! Form::password('password', ['class' => 'form-control', 'id' => 'exampleInputPassword1', 'placeholder' => 'Mot De Passe', 'required' => 'required', 'autofocus' => 'on']) !!}
                                <span class="fa fa-lock form-control-feedback text-muted"></span>

                                @if (session('error'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ session('error') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="clearfix">
                                <div class="pull-left mt-sm">
                                    <a href="{{ route('password.request') }}" class="text-muted">
                                        <small>Mot de Passe oublié?</small>
                                    </a>
                                </div>
                                <div class="pull-right">
                                    {!! Form::submit('Déverouiller', ['class' => 'btn btn-sm btn-primary']) !!}
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
                <!-- END panel-->
                <div class="p-lg text-center">
                    <span>&copy;</span>
                    <span>{{ date('Y') }}</span>
                    <span>-</span>
                    <span>{{ config('app.name') }}</span>
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
        <!-- SWEET ALERT -->
        <script src="{{ asset('angle/vendor/sweetalert/dist/sweetalert2.all.min.js') }}"></script>
        <!-- =============== APP SCRIPTS ===============-->
        <script src="{{ asset('angle/app/js/app.js') }}"></script>
        <!-- CUSTOM SCRIPT -->
        <script src="{{ asset('js/scripts.js') }}"></script>
        <script type="text/javascript">
            /*
                HANDLE ALERTS (SUCCESS + ERROR)
             */
            var message_error = "<?php echo session('error'); ?>", has_alert_error = !!(message_error);
            console.log(has_alert_error, message_error);
            handleAlerts(has_alert_error, 'error', message_error);
        </script>
    </body>

</html>