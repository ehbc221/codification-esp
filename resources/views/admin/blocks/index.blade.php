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
                <div class="col-md-12">
                    <div class="col-md-1 col-md-offset-11">
                        <a href="{{ route('admin.batiments.create') }}"><button class="btn btn-info"><i class="fa fa-plus"></i> Ajouter</button></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead class="bg-info-light">
                    <tr>
                        <th class="col-md-1">Id</th>
                        <th class="col-md-8">Nom</th>
                        <th class="col-md-3">Actions</th>
                    </tr>
                    </thead>
                    @if($blocks->isEmpty())
                        <tbody>
                        <tr>
                            <td colspan="3">
                                <h3 class="text text-center text-danger"><i class="fa fa-info-circle"></i> Aucun batiment à afficher.</h3>
                            </td>
                        </tr>
                        </tbody>
                    @else
                        <tbody>
                        @foreach($blocks as $block)
                            <tr>
                                <td>{{ $block->id }}</td>
                                <td>
                                    <div class="col-md-2"><span class="badge bg-gray-light">{{ $block->floors_count }} Étages</span></div>
                                    <div class="col-md-10">{{ $block->name }}</div>
                                </td>
                                <td class="forms-delete">
                                    {!! Form::open(['route' => ['admin.batiments.destroy', $block->id], 'method' => 'delete', 'class' => 'form-inline']) !!}
                                    {!! Form::token() !!}
                                    {!! Form::hidden('id', $block->id) !!}
                                    <span>
                                        <a href="{{ route('admin.batiments.show', ['id' => $block->id]) }}"><span class="btn btn-default" title="Voir"><i class="fa fa-eye"></i> Voir</span></a>
                                    </span>
                                    <span>
                                        <a href="{{ route('admin.batiments.edit', ['id' => $block->id]) }}"><span class="btn btn-default" title="Modifier"><i class="fa fa-pencil"></i> Modifier</span></a>
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
                            <td class="text text-center" colspan="3">{{ $blocks->links() }}</td>
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
        var has_alert_success = "<?php echo session('success') ?>", message_success = "<?php echo session('success'); ?>";
        handleAlerts(has_alert_success, 'success', message_success);
        /*
            HANDLE THE DELETE FORM
         */
        var forms_delete = $('.forms-delete'), title = 'Êtes-vous sûr de vouloir supprimer ce batiment?', text = 'Vous ne pourrez plus le récuperer!';
        forms_delete.each(function () {
            var form_delete = $(this).find('form')[0], button_delete = $(this).find('form').find('#button-delete')[0];
            console.log('form_delete ' + form_delete);
            console.log('button_delete ' + button_delete);
            console.log('title ' +  title);
            console.log('text ' + text);
            handleDeleteForm(form_delete, button_delete, title, text);
        });
    </script>
@endpush