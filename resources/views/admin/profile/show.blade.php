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
                                    <label class="col-md-2 col-sm-2 control-label">Identifiant</label>
                                    <div class="col-md-6 col-sm-10">
                                        <div class="form-control">{{ $user->id }}</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 col-sm-2 control-label">Nom</label>
                                    <div class="col-md-6 col-sm-10">
                                        <div class="form-control">{{ $user->name }}</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 col-sm-2 control-label">E-Mail</label>
                                    <div class="col-md-6 col-sm-10">
                                        <div class="form-control">{{ $user->email }}</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 col-sm-2 control-label">Téléphone</label>
                                    <div class="col-md-6 col-sm-10">
                                        <div class="form-control">{{ $user->phone }}</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 col-sm-2 control-label">CIN</label>
                                    <div class="col-md-6 col-sm-10">
                                        <div class="form-control">{{ $user->cin }}</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 col-sm-2 control-label">Matriculation</label>
                                    <div class="col-md-6 col-sm-10">
                                        <div class="form-control">{{ $user->matriculation }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel-footer text-center">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-4 col-sm-12">
                            <div class="col-md-2 col-sm-2">
                                <a href="{{ route('admin.profil.edit', ['id' => $user->id]) }}"><div class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Modifier"><i class="fa fa-pencil"></i> Modifier</div></a>
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
        });
    </script>
@endpush