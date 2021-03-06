@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- START panel-->
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">
                        {{ $controller_name }} |
                        <small>{{ $action_name }}</small>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">

                        {!! Form::model($user, ['route' => ['admin.profil.update', $user->id], 'method' => 'put', 'class' => 'form-horizontal']) !!}
                        {!! Form::token() !!}
                        {!! Form::hidden('id', $user->id) !!}

                        <div class="col-md-8 col-md-offset-2 col-sm-12">
                            <div class="form-group  {{ $errors->has('name') ? ' has-error' : '' }}">
                                {!!  Form::label('name', 'Nom <em class="text text-danger">*</em>', ['class' => 'col-md-2 col-sm-2 control-label'], false) !!}
                                <div class="col-md-6 col-sm-10">
                                    {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'value' => old('name'), 'required' => 'required', 'autofocus' => 'on']) !!}

                                    @if ($errors->has('name'))
                                        <div class="help-block">
                                            @foreach($errors->get('name') as $message)
                                                <strong>{{ $message }}</strong>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-md-offset-2 col-sm-12">
                            <div class="form-group  {{ $errors->has('email') ? ' has-error' : '' }}">
                                {!!  Form::label('email', 'Email <em class="text text-danger">*</em>', ['class' => 'col-md-2 col-sm-2 control-label'], false) !!}
                                <div class="col-md-6 col-sm-10">
                                    {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'email', 'value' => old('email'), 'required' => 'required']) !!}

                                    @if ($errors->has('email'))
                                        <div class="help-block">
                                            @foreach($errors->get('email') as $message)
                                                <strong>{{ $message }}</strong>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-md-offset-2 col-sm-12">
                            <div class="form-group  {{ $errors->has('password') ? ' has-error' : '' }}">
                                {!!  Form::label('password', 'Mot De Passe', ['class' => 'col-md-2 col-sm-2 control-label']) !!}
                                <div class="col-md-6 col-sm-10">
                                    {!! Form::password('password', ['class' => 'form-control', 'id' => 'password', 'value' => old('password')]) !!}

                                    @if ($errors->has('password'))
                                        <div class="help-block">
                                            @foreach($errors->get('password') as $message)
                                                <strong>{{ $message }}</strong>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-md-offset-2 col-sm-12">
                            <div class="form-group  {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                {!!  Form::label('password_confirmation', 'Confirmation Mot De Passe', ['class' => 'col-md-2 col-sm-2 control-label']) !!}
                                <div class="col-md-6 col-sm-10">
                                    {!! Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'password_confirmation', 'value' => old('password_confirmation')]) !!}

                                    @if ($errors->has('password_confirmation'))
                                        <div class="help-block">
                                            @foreach($errors->get('password_confirmation') as $message)
                                                <strong>{{ $message }}</strong>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-md-offset-2 col-sm-12">
                            <div class="form-group  {{ $errors->has('phone') ? ' has-error' : '' }}">
                                {!!  Form::label('phone', 'Téléphone <em class="text text-danger">*</em>', ['class' => 'col-md-2 col-sm-2 control-label'], false) !!}
                                <div class="col-md-6 col-sm-10">
                                    {!! Form::text('phone', null, ['class' => 'form-control', 'id' => 'phone', 'value' => old('phone'), 'required' => 'required']) !!}

                                    @if ($errors->has('phone'))
                                        <div class="help-block">
                                            @foreach($errors->get('phone') as $message)
                                                <strong>{{ $message }}</strong>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-md-offset-2 col-sm-12">
                            <div class="form-group  {{ $errors->has('cin') ? ' has-error' : '' }}">
                                {!!  Form::label('cin', 'CIN <em class="text text-danger">*</em>', ['class' => 'col-md-2 col-sm-2 control-label'], false) !!}
                                <div class="col-md-6 col-sm-10">
                                    {!! Form::text('cin', null, ['class' => 'form-control', 'id' => 'cin', 'value' => old('cin'), 'required' => 'required']) !!}

                                    @if ($errors->has('cin'))
                                        <div class="help-block">
                                            @foreach($errors->get('cin') as $message)
                                                <strong>{{ $message }}</strong>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-md-offset-2 col-sm-12">
                            <div class="form-group  {{ $errors->has('matriculation') ? ' has-error' : '' }}">
                                {!!  Form::label('matriculation', 'Matriculation <em class="text text-danger">*</em>', ['class' => 'col-md-2 col-sm-2 control-label'], false) !!}
                                <div class="col-md-6 col-sm-10">
                                    {!! Form::text('matriculation', null, ['class' => 'form-control', 'id' => 'matriculation', 'value' => old('matriculation'), 'required' => 'required']) !!}

                                    @if ($errors->has('matriculation'))
                                        <div class="help-block">
                                            @foreach($errors->get('matriculation') as $message)
                                                <strong>{{ $message }}</strong>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer text-center">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-4 col-sm-12">
                            <div class="col-md-2 col-md-offset- col-sm-2">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-pencil"></i> Modifier</button>
                            </div>

                            {!! Form::close() !!}

                            <div class="col-md-2 col-sm-2">
                                <a href="{{ route('admin.profil.show', ['id' => $user->id]) }}"><span class="btn btn-default" id="button-show" data-toggle="tooltip" data-placement="top" title="Détails"><i class="fa fa-eye"></i> Détails</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END panel-->
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            /*
                HANDLE ALERTS (SUCCESS + ERROR)
             */
            var has_alert_error = "<?php echo ($errors->any()) ? true : false; ?>";
            handleAlerts(has_alert_error, 'error', null);
            /*
                HANDLE CHECKBOX AND COUNTRY
             */
            var is_foreign = $("#is_foreign")[0], native_country = $("#native_country")[0];
            is_foreign.addEventListener('change', function() {
                if (is_foreign.value === 'non') {
                    native_country.value = 'Sénégal';
                }
            });
        });
    </script>
@endpush