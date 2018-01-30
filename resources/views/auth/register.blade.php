@extends('layouts.app')

@section('content')
    <!-- START panel-->
    <div class="panel panel-dark panel-flat">
        <div class="panel-heading text-center">
            <a href="{{ route('accueil') }}">
                <img src="{{ asset('angle/app/img/logo.png') }}" alt="Image" class="block-center img-rounded">
            </a>
        </div>
        <div class="panel-body">
            <p class="text-center pv">INSCRIVEZ VOUS POUR ACCEDER A LA PLATEFORME DE <strong><em>CODIFICATION ESP</em></strong>.</p>

            {!! Form::open(['route' => 'register', 'method' => 'post', 'class' => 'mb-lg', 'data-parsley-validate' => '', 'novalidate' => '']) !!}
            {!! Form::token() !!}

            <div class="form-group has-feedback {{ ($errors->has('email')) ? 'has-error' : '' }}">
                {!! Form::label('email', 'Adresse E-Mail', ['for' => 'email', 'class' => 'text-muted']) !!}
                {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Saisissez Votre E-Mail', 'value' => old('email'), 'autocomplete' => 'off', 'required' => 'required', 'autofocus' => 'on']) !!}
                <span class="fa fa-envelope form-control-feedback text-muted"></span>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback {{ ($errors->has('password')) ? 'has-error' : '' }}">
                {!! Form::label('password', 'Mot De Passe', ['for' => 'password', 'class' => 'text-muted']) !!}
                {!! Form::password('password', ['class' => 'form-control', 'id' => 'password', 'placeholder' => 'Saisissez Votre Mot de Passe', 'autocomplete' => 'off', 'required' => 'required']) !!}
                <span class="fa fa-lock form-control-feedback text-muted"></span>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback {{ ($errors->has('password_confirmation')) ? 'has-error' : '' }}">
                {!! Form::label('password_confirmation', 'Confirmation Mot De Passe', ['for' => 'password_confirmation', 'class' => 'text-muted']) !!}
                {!! Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'password_confirmation', 'placeholder' => 'Confirmez Votre Mot de Passe', 'autocomplete' => 'off', 'required' => 'required']) !!}
                <span class="fa fa-lock form-control-feedback text-muted"></span>

                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback {{ ($errors->has('phone')) ? 'has-error' : '' }}">
                {!! Form::label('phone', 'Adresse E-Mail', ['for' => 'phone', 'class' => 'text-muted']) !!}
                {!! Form::text('phone', null, ['class' => 'form-control', 'id' => 'phone', 'placeholder' => 'Saisissez Votre E-Mail', 'value' => old('phone'), 'autocomplete' => 'off', 'required' => 'required', 'autofocus' => 'on']) !!}
                <span class="fa fa-envelope form-control-feedback text-muted"></span>

                @if ($errors->has('phone'))
                    <span class="help-block">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback {{ ($errors->has('cin')) ? 'has-error' : '' }}">
                {!! Form::label('cin', 'Adresse E-Mail', ['for' => 'cin', 'class' => 'text-muted']) !!}
                {!! Form::text('cin', null, ['class' => 'form-control', 'id' => 'cin', 'placeholder' => 'Saisissez Votre E-Mail', 'value' => old('cin'), 'autocomplete' => 'off', 'required' => 'required', 'autofocus' => 'on']) !!}
                <span class="fa fa-envelope form-control-feedback text-muted"></span>

                @if ($errors->has('cin'))
                    <span class="help-block">
                        <strong>{{ $errors->first('cin') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback {{ ($errors->has('matriculation')) ? 'has-error' : '' }}">
                {!! Form::label('matriculation', 'Adresse E-Mail', ['for' => 'matriculation', 'class' => 'text-muted']) !!}
                {!! Form::text('matriculation', null, ['class' => 'form-control', 'id' => 'matriculation', 'placeholder' => 'Saisissez Votre E-Mail', 'value' => old('matriculation'), 'autocomplete' => 'off', 'required' => 'required', 'autofocus' => 'on']) !!}
                <span class="fa fa-envelope form-control-feedback text-muted"></span>

                @if ($errors->has('matriculation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('matriculation') }}</strong>
                    </span>
                @endif
            </div>

            {!! Form::submit('S\'Inscrire', ['class' => 'btn btn-block btn-primary mt-lg']) !!}
            {!! Form::close() !!}

            <p class="pt-lg text-center">Vous avez déjà un compte?</p><a href="{{ route('login') }}" class="btn btn-block btn-default">Se Connecter Maintenant</a>
        </div>
    </div>
@endsection