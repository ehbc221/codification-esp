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
                                        <div class="form-control">{{ $admin->name }}</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 col-sm-2 control-label">Email</label>
                                    <div class="col-md-6 col-sm-10">
                                        <div class="form-control">{{ $admin->email }}</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 col-sm-2 control-label">Téléphone</label>
                                    <div class="col-md-6 col-sm-10">
                                        <div class="form-control">{{ ($admin->phone) ? $admin->phone : 'Non Renseigné' }}</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 col-sm-2 control-label">CIN</label>
                                    <div class="col-md-6 col-sm-10">
                                        <div class="form-control">{{ $admin->cin }}</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 col-sm-2 control-label">Matriculation</label>
                                    <div class="col-md-6 col-sm-10">
                                        <div class="form-control">{{ $admin->matriculation }}</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 col-sm-2 control-label">Role</label>
                                    <div class="col-md-6 col-sm-10">
                                        <div class="form-control">{{ $admin->role_display_name }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel-footer text-center">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-3 col-sm-12">
                            <div class="col-md-2 col-md-offset-2 col-sm-3 col-sm-offset-3">
                                <a href="{{ route('admin.admins.index') }}"><div class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Liste des admins"><i class="fa fa-list"></i> Liste des admins</div></a>
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
            var form_delete = $('#form-delete'), button_delete = $('#button-delete')[0], title = 'Êtes-vous sûr de vouloir supprimer cet utilisateur?', text = 'Vous ne pourrez plus le récuperer!';
            handleDeleteForm(form_delete, button_delete, title, text);
        });
    </script>
@endpush