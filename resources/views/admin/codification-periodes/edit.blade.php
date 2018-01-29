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

                        {!! Form::model($codification_periode, ['route' => ['admin.periodes-codifications.update', $codification_periode->id], 'method' => 'put', 'class' => 'form-horizontal']) !!}
                        {!! Form::token() !!}

                        <div class="col-md-8 col-md-offset-2 col-sm-12">
                            <div class="form-group  {{ ($errors->has('school_year_start') || $errors->has('school_year_end')) ? ' has-error' : '' }}">
                                {!!  Form::label('school_year_start', 'Année Scolaire <em class="text text-danger">*</em>', ['class' => 'col-md-2 col-sm-2 control-label'], false) !!}
                                <div class="col-md-3 col-sm-4">
                                    {!! Form::number('school_year_start', date(now()->year), ['class' => 'form-control', 'id' => 'school_year_start', 'value' => old('school_year_start'), 'required' => 'required', 'autofocus' => 'on']) !!}

                                    @if ($errors->has('school_year_start'))
                                        <div class="help-block">
                                            @foreach($errors->get('school_year_start') as $message)
                                                <strong>{{ $message }}</strong>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-3 col-sm-4">
                                    {!! Form::number('school_year_end', date(now()->year) + 1, ['class' => 'form-control', 'id' => 'school_year_end', 'value' => old('school_year_end'), 'required' => 'required', 'autofocus' => 'on']) !!}

                                    @if ($errors->has('school_year_end'))
                                        <div class="help-block">
                                            @foreach($errors->get('school_year_end') as $message)
                                                <strong>{{ $message }}</strong>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group  {{ $errors->has('start_date') ? ' has-error' : '' }}">
                                {!!  Form::label('start_date', 'Date de début <em class="text text-danger">*</em>', ['class' => 'col-md-2 col-sm-2 control-label'], false) !!}
                                <div class="col-md-6 col-sm-10">
                                    {!! Form::text('start_date', null, ['class' => 'form-control', 'id' => 'start_date', 'value' => old('start_date'), 'required' => 'required', 'autofocus' => 'on']) !!}

                                    @if ($errors->has('start_date'))
                                        <div class="help-block">
                                            @foreach($errors->get('start_date') as $message)
                                                <strong>{{ $message }}</strong>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group  {{ $errors->has('end_date') ? ' has-error' : '' }}">
                                {!!  Form::label('end_date', 'Date de fin <em class="text text-danger">*</em>', ['class' => 'col-md-2 col-sm-2 control-label'], false) !!}
                                <div class="col-md-6 col-sm-10">
                                    {!! Form::text('end_date', null, ['class' => 'form-control', 'id' => 'end_date', 'value' => old('end_date'), 'required' => 'required', 'autofocus' => 'on']) !!}

                                    @if ($errors->has('end_date'))
                                        <div class="help-block">
                                            @foreach($errors->get('end_date') as $message)
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
                        <div class="col-md-8 col-md-offset-2 col-sm-12">
                            <div class="col-md-2 col-md-offset-1 col-sm-2">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-pencil"></i> Modifier</button>
                            </div>

                            {!! Form::close() !!}

                            {!! Form::open(['route' => ['admin.periodes-codifications.destroy', $codification_periode->id], 'method' => 'delete', 'class' => 'form-inline', 'id' => 'form-delete']) !!}
                            {!! Form::token() !!}
                            {!! Form::hidden('id', $codification_periode->id) !!}
                            <div class="col-md-2 col-sm-3">
                                <span class="btn btn-danger" id="button-delete" data-toggle="tooltip" data-placement="top" title="Supprimer"><i class="fa fa-trash"></i> Supprimer</span>
                            </div>
                            {!! Form::close() !!}

                            <div class="col-md-2 col-sm-2">
                                <a href="{{ route('admin.periodes-codifications.show', ['id' => $codification_periode->id]) }}"><span class="btn btn-default" id="button-show" data-toggle="tooltip" data-placement="top" title="Détails"><i class="fa fa-eye"></i> Détails</span></a>
                            </div>
                            <div class="col-md-2 col-md-offset-0 col-sm-4 col-sm-offset-1">
                                <a href="{{ route('admin.periodes-codifications.index') }}"><div class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Liste des périodes de codification"><i class="fa fa-list"></i> Liste des périodes de codification</div></a>
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
                $("#start_date").datepicker();
                $("#end_date").datepicker();
            });
            /*
                HANDLE ALERTS (SUCCESS + ERROR)
             */
            var has_alert_error = "<?php echo ($errors->any()) ? true : false; ?>";
            handleAlerts(has_alert_error, 'error', null);
            /*
                HANDLE THE DELETE FORM
             */
            var form_delete = $('#form-delete'), button_delete = $('#button-delete')[0], title = 'Êtes-vous sûr de vouloir supprimer cette période de codification?', text = 'Vous ne pourrez plus la récuperer!';
            handleDeleteForm(form_delete, button_delete, title, text);
        });
    </script>
@endpush