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
            <p class="text-center pv">CONNECTEZ VOUS POUR CONTINUER.</p>

            {!! Form::open(['route' => 'login', 'method' => 'post']) !!}
            {!! Form::token() !!}

                <div class="form-group has-feedback">
                    {!! Form::label('email', 'Adresse E-Mail', ['class' => 'text-muted']) !!}
                    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'E-Mail', 'value' => old('email'), 'required' => 'required', 'autofocus' => 'on']) !!}
                    <span class="fa fa-envelope form-control-feedback text-muted"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong class="text text-danger">{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback">
                    {!! Form::label('password', 'Mot De Passe', ['class' => 'text-muted']) !!}
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Mot De Passe', 'required' => 'required']) !!}
                    <span class="fa fa-lock form-control-feedback text-muted"></span>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong class="text text-danger">{{ $errors->first('password') }}</strong>
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
@endsection