@extends('layouts.student')

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

                        {!! Form::model($student, ['route' => ['student.profil.update', $student->user_id], 'method' => 'put', 'class' => 'form-horizontal']) !!}
                        {!! Form::token() !!}
                        {!! Form::hidden('id', $student->id) !!}
                        {!! Form::hidden('user_id', $student->user_id) !!}

                        <fieldset>
                            <legend class="col-md-8 col-md-offset-2">Compte</legend>
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
                        </fieldset>

                        <fieldset>
                            <legend class="col-md-8 col-md-offset-2">Profil Étudiant</legend>
                            <div class="col-md-8 col-md-offset-2 col-sm-12">
                                <div class="form-group  {{ $errors->has('date_of_birth') ? ' has-error' : '' }}">
                                    {!!  Form::label('date_of_birth', 'Date De Naissance <em class="text text-danger">*</em>', ['class' => 'col-md-2 col-sm-2 control-label'], false) !!}
                                    <div class="col-md-6 col-sm-10">
                                        {!! Form::text('date_of_birth', null, ['class' => 'form-control', 'id' => 'date_of_birth', 'value' => old('date_of_birth'), 'required' => 'required', 'autofocus' => 'on']) !!}

                                        @if ($errors->has('date_of_birth'))
                                            <div class="help-block">
                                                @foreach($errors->get('date_of_birth') as $message)
                                                    <strong>{{ $message }}</strong>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 col-md-offset-2 col-sm-12">
                                <div class="form-group  {{ $errors->has('place_of_birth') ? ' has-error' : '' }}">
                                    {!!  Form::label('place_of_birth', 'Lieu De Naissance <em class="text text-danger">*</em>', ['class' => 'col-md-2 col-sm-2 control-label'], false) !!}
                                    <div class="col-md-6 col-sm-10">
                                        {!! Form::text('place_of_birth', null, ['class' => 'form-control', 'id' => 'place_of_birth', 'value' => old('place_of_birth'), 'required' => 'required', 'autofocus' => 'on']) !!}

                                        @if ($errors->has('place_of_birth'))
                                            <div class="help-block">
                                                @foreach($errors->get('place_of_birth') as $message)
                                                    <strong>{{ $message }}</strong>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 col-md-offset-2 col-sm-12">
                                <div class="form-group  {{ $errors->has('sex') ? ' has-error' : '' }}">
                                    {!!  Form::label('sex', 'Sexe <em class="text text-danger">*</em>', ['class' => 'col-md-2 col-sm-2 control-label'], false) !!}
                                    <div class="col-md-6 col-sm-10">
                                        {!! Form::select('sex', $sexes, old('sex'), ['class' => 'form-control', 'id' => 'sex', 'placeholder' => 'Sélectionnez un sexe...', 'required' => 'required', 'autofocus' => 'on']) !!}

                                        @if ($errors->has('sex'))
                                            <div class="help-block">
                                                @foreach($errors->get('sex') as $message)
                                                    <strong>{{ $message }}</strong>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 col-md-offset-2 col-sm-12">
                                <div class="form-group  {{ $errors->has('grade_id') ? ' has-error' : '' }}">
                                    {!!  Form::label('grade_id', 'Niveau <em class="text text-danger">*</em>', ['class' => 'col-md-2 col-sm-2 control-label'], false) !!}
                                    <div class="col-md-6 col-sm-10">
                                        {!! Form::select('grade_id', $grades, old('grade_id'), ['class' => 'form-control', 'id' => 'grade_id', 'placeholder' => 'Sélectionnez un niveau', 'required' => 'required', 'autofocus' => 'on']) !!}

                                        @if ($errors->has('grade_id'))
                                            <div class="help-block">
                                                @foreach($errors->get('grade_id') as $message)
                                                    <strong>{{ $message }}</strong>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 col-md-offset-2 col-sm-12">
                                <div class="form-group  {{ $errors->has('is_foreign') ? ' has-error' : '' }}">
                                    {!!  Form::label('is_foreign', 'Etranger ? <em class="text text-danger">*</em>', ['class' => 'col-md-2 col-sm-2 control-label'], false) !!}
                                    <div class="col-md-6 col-sm-10">
                                        {!! Form::select('is_foreign', ['oui' => 'Oui', 'non' => 'Non'], old('is_foreign'), ['class' => 'form-control', 'id' => 'is_foreign', 'autofocus' => 'on']) !!}

                                        @if ($errors->has('is_foreign'))
                                            <div class="help-block">
                                                @foreach($errors->get('is_foreign') as $message)
                                                    <strong>{{ $message }}</strong>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 col-md-offset-2 col-sm-12">
                                <div class="form-group  {{ $errors->has('native_country') ? ' has-error' : '' }}">
                                    {!!  Form::label('native_country', 'Pays D\'Origine <em class="text text-danger">*</em>', ['class' => 'col-md-2 col-sm-2 control-label'], false) !!}
                                    <div class="col-md-6 col-sm-10">
                                        {!! Form::text('native_country', null, ['class' => 'form-control', 'id' => 'native_country', 'value' => old('native_country'), 'required' => 'required', 'autofocus' => 'on']) !!}

                                        @if ($errors->has('native_country'))
                                            <div class="help-block">
                                                @foreach($errors->get('native_country') as $message)
                                                    <strong>{{ $message }}</strong>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </fieldset>

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
                                <a href="{{ route('student.profil.show', ['id' => $student->id]) }}"><span class="btn btn-default" id="button-show" data-toggle="tooltip" data-placement="top" title="Détails"><i class="fa fa-eye"></i> Détails</span></a>
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
    <!-- DATEPICKER-->
    <link rel="stylesheet" href="{{ asset('angle/vendor/jquery-ui/themes/smoothness/jquery-ui.css') }}">
    <script src="{{ asset('angle/vendor/jquery-ui/ui/datepicker.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            /*
                DATEPICKERS
            */
            $(function() {
                $("#date_of_birth").datepicker();
            });
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