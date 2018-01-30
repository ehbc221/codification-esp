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
                    <form class="form-horizontal">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2 col-sm-12">
                                <fieldset>
                                    <legend>Compte</legend>
                                    <div class="form-group">
                                        <label class="col-md-2 col-sm-2 control-label">Identifiant</label>
                                        <div class="col-md-6 col-sm-10">
                                            <div class="form-control">{{ $student->user_id }}</div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 col-sm-2 control-label">Nom</label>
                                        <div class="col-md-6 col-sm-10">
                                            <div class="form-control">{{ $student->name }}</div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 col-sm-2 control-label">E-Mail</label>
                                        <div class="col-md-6 col-sm-10">
                                            <div class="form-control">{{ $student->email }}</div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 col-sm-2 control-label">Téléphone</label>
                                        <div class="col-md-6 col-sm-10">
                                            <div class="form-control">{{ $student->phone }}</div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 col-sm-2 control-label">CIN</label>
                                        <div class="col-md-6 col-sm-10">
                                            <div class="form-control">{{ $student->cin }}</div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 col-sm-2 control-label">Matriculation</label>
                                        <div class="col-md-6 col-sm-10">
                                            <div class="form-control">{{ $student->matriculation }}</div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <legend>Profil Étudiant</legend>
                                    <div class="form-group">
                                        <label class="col-md-2 col-sm-2 control-label">Identifiant</label>
                                        <div class="col-md-6 col-sm-10">
                                            <div class="form-control">{{ $student->id }}</div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 col-sm-2 control-label">Date De Naissance</label>
                                        <div class="col-md-6 col-sm-10">
                                            <div class="form-control">{{ $student->date_of_birth }}</div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 col-sm-2 control-label">Lieu De Naissance</label>
                                        <div class="col-md-6 col-sm-10">
                                            <div class="form-control">{{ $student->place_of_birth }}</div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 col-sm-2 control-label">Sexe</label>
                                        <div class="col-md-6 col-sm-10">
                                            <div class="form-control">{{ $student->sex }}</div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 col-sm-2 control-label">Niveau</label>
                                        <div class="col-md-6 col-sm-10">
                                            <div class="form-control">{{ $student->grade }}</div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 col-sm-2 control-label">Étranger ?</label>
                                        <div class="col-md-6 col-sm-10">
                                            <div class="form-control">{{ ($student->is_foreign) ? 'Oui' : 'Non' }}</div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 col-sm-2 control-label">Pays D'Origine</label>
                                        <div class="col-md-6 col-sm-10">
                                            <div class="form-control">{{ $student->native_country }}</div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel-footer text-center">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-4 col-sm-12">
                            <div class="col-md-2 col-sm-2">
                                <a href="{{ route('admin.etudiants.index') }}"><div class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Liste des étudiants"><i class="fa fa-list"></i> Liste des étudiants</div></a>
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