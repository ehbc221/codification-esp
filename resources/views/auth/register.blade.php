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
                <p class="text-center pv">INSCRIVEZ VOUS POUR ACCEDER A LA PLATEFORME.</p>
                {!! Form::open(['route' => 'register', 'method' => 'post', 'class' => 'mb-lg', 'data-parsley-validate' => '', 'novalidate' => '']) !!}
                {!! Form::token() !!}
                <div class="form-group has-feedback">
                    {!! Form::label('email', 'Adresse E-Mail', ['for' => 'signupInputEmail1', 'class' => 'text-muted']) !!}
                    {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'signupInputEmail1', 'placeholder' => 'Saisissez Votre E-Mail', 'value' => old('email'), 'autocomplete' => 'off', 'required' => 'required', 'autofocus' => 'on']) !!}
                    <span class="fa fa-envelope form-control-feedback text-muted"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback">
                    {!! Form::label('password', 'Mot De Passe', ['for' => 'signupInputPassword1', 'class' => 'text-muted']) !!}
                    {!! Form::password('password', ['class' => 'form-control', 'id' => 'signupInputPassword1', 'placeholder' => 'Saisissez Votre Mot de Passe', 'autocomplete' => 'off', 'required' => 'required']) !!}
                    <span class="fa fa-lock form-control-feedback text-muted"></span>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback">
                    {!! Form::label('password_confirmation', 'Confirmation Mot De Passe', ['for' => 'signupInputRePassword1', 'class' => 'text-muted']) !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'signupInputRePassword1', 'placeholder' => 'Confirmez Votre Mot de Passe', 'autocomplete' => 'off', 'required' => 'required']) !!}
                    <span class="fa fa-lock form-control-feedback text-muted"></span>

                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
                {!! Form::submit('S\'Inscrire', ['class' => 'btn btn-block btn-primary mt-lg']) !!}
                {!! Form::close() !!}
                <p class="pt-lg text-center">Vous avez déjà un compte?</p><a href="{{ route('login') }}" class="btn btn-block btn-default">Se Connecter Maintenant</a>
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