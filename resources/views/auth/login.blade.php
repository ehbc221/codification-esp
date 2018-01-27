<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="Bootstrap Admin App + jQuery">
        <meta name="keywords" content="app, responsive, jquery, bootstrap, dashboard, admin">
        <title>Angle - Bootstrap Admin Template</title>
        <!-- =============== VENDOR STYLES ===============-->
        <!-- FONT AWESOME-->
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
        <div class="block-center mt-xl wd-xl">
            <!-- START panel-->
            <div class="panel panel-dark panel-flat">
                <div class="panel-heading text-center">
                    <a href="{{ route('accueil') }}">
                        <img src="{{ asset('angle/app/img/logo.png') }}" alt="Image" class="block-center img-rounded">
                    </a>
                </div>
                <div class="panel-body">
                    <p class="text-center pv">CONNECTEZ VOUS POUR CONTINUER.</p>
                    {!! Form::open(['route' => 'login', 'method' => 'post']) !!}
                    {!! Form::token() !!}
                        <div class="form-group has-feedback">
                            {!! Form::label('email', 'Adresse E-Mail', ['class' => 'text-muted']) !!}
                            {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'E-Mail', 'value' => old('email'), 'required' => 'required', 'autofocus' => 'on']) !!}
                            <span class="fa fa-envelope form-control-feedback text-muted"></span>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group has-feedback">
                            {!! Form::label('password', 'Mot De Passe', ['class' => 'text-muted']) !!}
                            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Mot De Passe', 'required' => 'required']) !!}
                            <span class="fa fa-lock form-control-feedback text-muted"></span>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="clearfix">
                            <div class="checkbox c-checkbox pull-left mt0">
                                <label>
                                    {!! Form::checkbox('remember', null, ['checked' => ((old('remember')) ? 'true' : 'false') ]) !!}
                                    <span class="fa fa-check"></span>Se Souvenir de Moi
                                </label>
                            </div>
                            <div class="pull-right"><a href="{{ route('password.request') }}" class="text-muted">Mot de passe oublié?</a>
                            </div>
                        </div>
                        {!! Form::submit('Se Connecter', ['class' => 'btn btn-block btn-primary mt-lg']) !!}
                    {!! Form::close() !!}
                    <p class="pt-lg text-center">Vous n'avez pas de Compte?</p><a href="{{ route('register') }}" class="btn btn-block btn-default">S'Inscrire Maintenant</a>
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
    <!-- =============== APP SCRIPTS ===============-->
    <script src="{{ asset('angle/app/js/app.js') }}"></script>
    </body>

</html>