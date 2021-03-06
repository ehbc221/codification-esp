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
                    <form class="form-horizontal">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2 col-sm-12">
                                <div class="form-group">
                                    <label class="col-md-2 col-sm-2 control-label">Nom</label>
                                    <div class="col-md-6 col-sm-10">
                                        <div class="form-control">{{ $codification_periode->name }}</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 col-sm-2 control-label">Année Scolaire</label>
                                    <div class="col-md-3 col-sm-5">
                                        <div class="form-control">{{ $codification_periode->school_year_start }}</div>
                                    </div>
                                    <div class="col-md-3 col-sm-5">
                                        <div class="form-control">{{ $codification_periode->school_year_end }}</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 col-sm-2 control-label">Date de début</label>
                                    <div class="col-md-6 col-sm-10">
                                        <div class="form-control">{{ $codification_periode->start_date }}</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 col-sm-2 control-label">Date de fin</label>
                                    <div class="col-md-6 col-sm-10">
                                        <div class="form-control">{{ $codification_periode->end_date }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel-footer text-center">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-3 col-sm-12">
                            <div class="col-md-2 col-sm-2">
                                <a href="{{ route('admin.periodes-codifications.edit', ['id' => $codification_periode->id]) }}"><span class="btn btn-primary" id="button-edit" data-toggle="tooltip" data-placement="top" title="Modifier"><i class="fa fa-pencil"></i> Modifier</span></a>
                            </div>
                            {!! Form::open(['route' => ['admin.periodes-codifications.destroy', $codification_periode->id], 'method' => 'delete', 'class' => 'form-inline', 'id' => 'form-delete']) !!}
                            {!! Form::token() !!}
                            {!! Form::hidden('id', $codification_periode->id) !!}
                            <div class="col-md-2 col-sm-3">
                                <span class="btn btn-danger" id="button-delete" data-toggle="tooltip" data-placement="top" title="Supprimer"><i class="fa fa-trash"></i> Supprimer</span>
                            </div>
                            {!! Form::close() !!}
                            <div class="col-md-2 col-md-offset-1 col-sm-3 col-sm-offset-3">
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
    <script src="{{ asset('js/helpers.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            /*
                HANDLE ALERTS (SUCCESS + ERROR)
             */
            var has_alert_success = "<?php echo session('success') ?>", message_success = "<?php echo session('success'); ?>";
            handleAlerts(has_alert_success, 'success', message_success);
            /*
                HANDLE THE DELETE FORM
             */
            var form_delete = $('#form-delete'), button_delete = $('#button-delete')[0], title = 'Êtes-vous sûr de vouloir supprimer cette période de codification?', text = 'Vous ne pourrez plus la récuperer!';
            handleDeleteForm(form_delete, button_delete, title, text);
        });
    </script>
@endpush