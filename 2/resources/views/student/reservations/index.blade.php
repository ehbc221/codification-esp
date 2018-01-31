@extends('layouts.student')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-12">
                    <span class="panel-title">
                        {{ $controller_name }} |
                        <small>{{ $action_name }}</small>
                    </span>
                </div>
                <div class="col-md-12">
                    @codificationPeriode
                        <div class="col-md-1 col-md-offset-10">
                            <a href="{{ route('student.reservations.create') }}"><button class="btn btn-info"><i class="fa fa-plus"></i> Ajouter</button></a>
                        </div>
                    @else
                        <div class="col-md-2 col-md-offset-9">
                            <button class="btn btn-danger"><i class="fa fa-info-circle"></i> Impossible de réserver maintenant.</button>
                        </div>
                    @endcodificationPeriode
                </div>
            </div>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead class="bg-info-light">
                    <tr>
                        <th class="col-md-1">Id</th>
                        <th class="col-md-2">Période de Codification</th>
                        <th class="col-md-5">Position</th>
                        <th class="col-md-4">Actions</th>
                    </tr>
                    </thead>
                    @if($reservations->isEmpty())
                        <tbody>
                        <tr>
                            <td colspan="4">
                                <h3 class="text text-center text-danger"><i class="fa fa-info-circle"></i> Aucune réservation à afficher.</h3>
                            </td>
                        </tr>
                        </tbody>
                    @else
                        <tbody>
                        @foreach($reservations as $reservation)
                            <tr>
                                <td>{{ $reservation->id }}</td>
                                <td>
                                    {{ $reservation->codification_periode_name }}
                                </td>
                                <td>{{ $reservation->position_name }}</td>
                                <td class="forms-delete">
                                    {!! Form::open(['route' => ['student.reservations.destroy', $reservation->id], 'method' => 'delete', 'class' => 'form-inline']) !!}
                                    {!! Form::token() !!}
                                    {!! Form::hidden('id', $reservation->id) !!}
                                    <span>
                                        <a href="{{ route('student.reservations.show', ['id' => $reservation->id]) }}"><span class="btn btn-default" title="Voir"><i class="fa fa-eye"></i> Voir</span></a>
                                    </span>
                                    <span>
                                        <a href="{{ route('student.reservations.edit', ['id' => $reservation->id]) }}"><span class="btn btn-default" title="Modifier"><i class="fa fa-pencil"></i> Modifier</span></a>
                                    </span>
                                    <span>
                                        <span class="btn btn-danger" id="button-delete" title="Supprimer"><i class="fa fa-trash"></i> Supprimer</span>
                                    </span>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot class="bg-gray-lighter">
                        <tr>
                            <td class="text text-center" colspan="4">{{ $reservations->links() }}</td>
                        </tr>
                        </tfoot>
                    @endif
                </table>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        /*
            HANDLE ALERTS (SUCCESS + ERROR)
         */
        var has_alert_success = "<?php echo session('success') ?>", message_success = "<?php echo session('success'); ?>", has_alert_error = "<?php echo session('error') ?>", message_error = "<?php echo session('error'); ?>";
        handleAlerts(has_alert_success, 'success', message_success);
        handleAlerts(has_alert_error, 'error', message_error);
        /*
            HANDLE THE DELETE FORM
         */
        var forms_delete = $('.forms-delete'), title = 'Êtes-vous sûr de vouloir supprimer cette réservation?', text = 'Vous ne pourrez plus la récuperer!';
        forms_delete.each(function () {
            var form_delete = $(this).find('form')[0], button_delete = $(this).find('form').find('#button-delete')[0];
            handleDeleteForm(form_delete, button_delete, title, text);
        });
    </script>
@endpush