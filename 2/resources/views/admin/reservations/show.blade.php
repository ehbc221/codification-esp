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
                            <div class="col-md-10 col-md-offset-1 col-sm-12">
                                <div class="form-group">
                                    <label class="col-md-2 col-sm-2 control-label">Période De Codification</label>
                                    <div class="col-md-8 col-sm-10">
                                        <div class="form-control">{{ $reservation->codification_periode_name }}</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 col-sm-2 control-label">Étudiant</label>
                                    <div class="col-md-8 col-sm-10">
                                        <div class="form-control">{{ $reservation->student_name }}</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 col-sm-2 control-label">Position</label>
                                    <div class="col-md-8 col-sm-10">
                                        <div class="form-control">{{ $reservation->position_number }}</div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 col-sm-2 control-label">Validé ?</label>
                                    <div class="col-md-8 col-sm-10">
                                        <div class="form-control">{{ ($reservation->is_validated) ? 'Oui' : 'Non' }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel-footer text-center">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-3 col-sm-12">
                            <div class="col-md-2 col-md-offset-3 col-sm-3 col-sm-offset-3">
                                <a href="{{ route('admin.reservations.index') }}"><div class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Liste des réservations"><i class="fa fa-list"></i> Liste des réservations</div></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END panel-->
        </div>
    </div>
@endsection