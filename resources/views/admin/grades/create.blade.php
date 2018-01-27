@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
        {!! Form::open(['route' => 'admin.niveaux.store', 'method' => 'post', 'class' => 'form-horizontal']) !!}
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
                            <div class="form-group  {{ $errors->has('number') ? ' has-error' : '' }}">
                                {!!  Form::label('number', 'Nom <em class="text text-danger">*</em>', ['class' => 'col-md-2 col-sm-2 control-label'], false) !!}
                                <div class="col-md-6 col-sm-10">
                                    {!! Form::number('number', null, ['class' => 'form-control', 'id' => 'number', 'value' => old('number'), 'required' => 'required', 'autofocus' => 'on']) !!}

                                    @if ($errors->has('number'))
                                        <div class="help-block">
                                            @foreach($errors->get('number') as $message)
                                                <strong>{{ $message }}</strong>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group  {{ $errors->has('formation_id') ? ' has-error' : '' }}">
                                {!!  Form::label('formation_id', 'Formation <em class="text text-danger">*</em>', ['class' => 'col-md-2 col-sm-2 control-label'], false) !!}
                                <div class="col-md-6 col-sm-10">
                                    {!! Form::select('formation_id', $formations, old('formation_id'), ['class' => 'form-control', 'id' => 'formation_id', 'placeholder' => 'Sélectionnez une formation...', 'required' => 'required']) !!}

                                    @if ($errors->has('formation_id'))
                                        <div class="help-block">
                                            @foreach($errors->get('formation_id') as $message)
                                                <strong>{{ $message }}</strong>
                                            @endforeach
                                        </div>
                                    @endif
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
                                    <a href="{{ route('admin.niveaux.index') }}"><div class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Liste des niveaux"><i class="fa fa-list"></i> Liste des niveaux</div></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END panel-->
                {!! Form::close() !!}
            </div>
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