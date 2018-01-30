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
            <p class="text-center pv">Réinitialisation Mot De Passe.</p>

            {!! Form::open(['route' => 'password.request', 'method' => 'post']) !!}
            {!! Form::token() !!}
            {!! Form::hidden('token', $token) !!}

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

            <div class="form-group has-feedback">
                {!! Form::label('password_confirmation', 'Confirmation Mot De Passe', ['class' => 'text-muted']) !!}
                {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Mot De Passe', 'required' => 'required']) !!}
                <span class="fa fa-lock form-control-feedback text-muted"></span>

                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                @endif
            </div>

            {!! Form::submit('Récupérer', ['class' => 'btn btn-block btn-primary mt-lg']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection