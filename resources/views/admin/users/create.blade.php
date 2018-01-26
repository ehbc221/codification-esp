@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
        {!! Form::open(['route' => 'admin.utilisateurs.store', 'method' => 'post', 'class' => 'form-horizontal']) !!}
        {!! Form::token() !!}
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
                        <div class="col-md-8 col-md-offset-2 col-sm-12">
                            <div class="form-group  {{ $errors->has('name') ? ' has-error' : '' }}">
                                {!!  Form::label('name', 'Nom', ['class' => 'col-md-2 col-sm-2 control-label']) !!}
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
                                {!!  Form::label('email', 'Email', ['class' => 'col-md-2 col-sm-2 control-label']) !!}
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
                                {!!  Form::label('password', 'Password', ['class' => 'col-md-2 col-sm-2 control-label']) !!}
                                <div class="col-md-6 col-sm-10">
                                    {!! Form::password('password', ['class' => 'form-control', 'id' => 'password', 'value' => old('password'), 'required' => 'required']) !!}

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
                            <div class="form-group  {{ $errors->has('phone') ? ' has-error' : '' }}">
                                {!!  Form::label('phone', 'Téléphone', ['class' => 'col-md-2 col-sm-2 control-label']) !!}
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
                            <div class="form-group  {{ $errors->has('national_identification_number') ? ' has-error' : '' }}">
                                {!!  Form::label('national_identification_number', 'CIN', ['class' => 'col-md-2 col-sm-2 control-label']) !!}
                                <div class="col-md-6 col-sm-10">
                                    {!! Form::text('national_identification_number', null, ['class' => 'form-control', 'id' => 'national_identification_number', 'value' => old('national_identification_number'), 'required' => 'required']) !!}

                                    @if ($errors->has('national_identification_number'))
                                        <div class="help-block">
                                            @foreach($errors->get('national_identification_number') as $message)
                                                <strong>{{ $message }}</strong>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-md-offset-2 col-sm-12">
                            <div class="form-group  {{ $errors->has('matriculation') ? ' has-error' : '' }}">
                                {!!  Form::label('matriculation', 'Matriculation', ['class' => 'col-md-2 col-sm-2 control-label']) !!}
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
                        <div class="col-md-8 col-md-offset-3 col-sm-12">
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Ajouter</button>
                            </div>
                            <div class="col-sm-2 col-sm-offset-3">
                                <a href="{{ route('admin.utilisateurs.index') }}"><div class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Liste des utilisateurs"><i class="fa fa-list"></i> Liste des utilisateurs</div></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END panel-->
            {!! Form::close() !!}
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
        });
    </script>
@endpush