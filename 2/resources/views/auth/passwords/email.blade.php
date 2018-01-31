@extends('layouts.app')

@section('content')
    <!-- START panel-->
    <div class="panel panel-dark panel-flat">
        <div class="panel-heading text-center">
            <a href="#">
                <img src="{{ asset('angle/app/img/logo.png') }}" alt="Image" class="block-center img-rounded">
            </a>
        </div>
        <div class="panel-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <p class="text-center pv">Récuperation mot de passe</p>
            <form method="POST" action="{{ route('password.email') }}" role="form">
                {{ csrf_field() }}
                <p class="text-center">Saisissez votre adresse E-Mail et vous recevrez les instructions pour récupérer votre mot de passe.</p>
                <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="resetInputEmail1" class="text-muted">Email address</label>
                    <input id="resetInputEmail1" type="email" name="email" value="{{ $email or old('email') }}" placeholder="Enter email" autocomplete="off" class="form-control">
                    <span class="fa fa-envelope form-control-feedback text-muted"></span>

                    @if ($errors->has('email'))
                        <p class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </p>
                    @endif
                </div>
                <button type="submit" class="btn btn-danger btn-block">M'envoyer le lien de récupération</button>
            </form>
        </div>
    </div>
    <!-- END panel-->
@endsection