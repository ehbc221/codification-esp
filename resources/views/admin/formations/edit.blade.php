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

                        {!! Form::model($formation, ['route' => ['admin.formations.update', $formation->id], 'method' => 'put', 'class' => 'form-horizontal']) !!}
                        {!! Form::token() !!}

                        <div class="col-md-8 col-md-offset-2 col-sm-12">
                            <div class="form-group  {{ $errors->has('name') ? ' has-error' : '' }}">
                                {!!  Form::label('name', 'Nom <em class="text text-danger">*</em>', ['class' => 'col-md-2 col-sm-2 control-label'], false) !!}
                                <div class="col-md-6 col-sm-10">
                                    {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'value' => old('name'), 'required' => 'required', 'autofocus' => 'on']) !!}

                                    @if ($errors->has('name'))
                                        <div class="help-block">
                                            @foreach($errors->get('name') as $message)
                                                <strong>{{ $message }}</strong>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group  {{ $errors->has('department_id') ? ' has-error' : '' }}">
                                {!!  Form::label('department_id', 'Département <em class="text text-danger">*</em>', ['class' => 'col-md-2 col-sm-2 control-label'], false) !!}
                                <div class="col-md-6 col-sm-10">
                                    {!! Form::select('department_id', $departments, old('department_id'), ['class' => 'form-control', 'id' => 'department_id', 'placeholder' => 'Sélectionnez un batiment...', 'required' => 'required']) !!}

                                    @if ($errors->has('department_id'))
                                        <div class="help-block">
                                            @foreach($errors->get('department_id') as $message)
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

                            {!! Form::open(['route' => ['admin.formations.destroy', $formation->id], 'method' => 'delete', 'class' => 'form-inline', 'id' => 'form-delete']) !!}
                            {!! Form::token() !!}
                            {!! Form::hidden('id', $formation->id) !!}
                            <div class="col-md-2 col-sm-3">
                                <span class="btn btn-danger" id="button-delete" data-toggle="tooltip" data-placement="top" title="Supprimer"><i class="fa fa-trash"></i> Supprimer</span>
                            </div>
                            {!! Form::close() !!}

                            <div class="col-md-2 col-sm-2">
                                <a href="{{ route('admin.formations.show', ['id' => $formation->id]) }}"><span class="btn btn-default" id="button-show" data-toggle="tooltip" data-placement="top" title="Détails"><i class="fa fa-eye"></i> Détails</span></a>
                            </div>
                            <div class="col-md-2 col-md-offset-0 col-sm-4 col-sm-offset-1">
                                <a href="{{ route('admin.formations.index') }}"><div class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Liste des formations"><i class="fa fa-list"></i> Liste des formations</div></a>
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
    <script type="text/javascript">
        $(document).ready(function () {
            /*
                HANDLE ALERTS (SUCCESS + ERROR)
             */
            var has_alert_error = "<?php echo ($errors->any()) ? true : false; ?>";
            handleAlerts(has_alert_error, 'error', null);
            /*
                HANDLE THE DELETE FORM
             */
            var form_delete = $('#form-delete'), button_delete = $('#button-delete')[0], title = 'Êtes-vous sûr de vouloir supprimer cette formation?', text = 'Vous ne pourrez plus la récuperer!';
            handleDeleteForm(form_delete, button_delete, title, text);
        });
    </script>
@endpush