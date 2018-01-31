@extends('layouts.admin')

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
            </div>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead class="bg-info-light">
                    <tr>
                        <th class="col-md-1">Id</th>
                        <th class="col-md-3">Période de Codification</th>
                        <th class="col-md-6">Position</th>
                        <th class="col-md-1">Validé ?</th>
                        <th class="col-md-1">Actions</th>
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
                                <td>{{ ($reservation->is_validated) ? 'Oui' : 'Non' }}</td>
                                <td>
                                    <span>
                                        <a href="{{ route('admin.reservations.show', ['id' => $reservation->id]) }}"><span class="btn btn-default" title="Voir"><i class="fa fa-eye"></i> Voir</span></a>
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot class="bg-gray-lighter">
                        <tr>
                            <td class="text text-center" colspan="5">{{ $reservations->links() }}</td>
                        </tr>
                        </tfoot>
                    @endif
                </table>
            </div>
        </div>
    </div>
@endsection