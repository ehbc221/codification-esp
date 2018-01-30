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
                    <div class="row">

                        {!! Form::model($reservation, ['route' => ['student.reservations.update', $reservation->id], 'method' => 'put', 'class' => 'form-horizontal']) !!}
                        {!! Form::token() !!}
                        {!!  Form::hidden('id', $reservation->id) !!}

                        <div class="col-md-8 col-md-offset-2 col-sm-12">
                            <div class="form-group  {{ $errors->has('codification_periode_id') ? ' has-error' : '' }}">
                                {!!  Form::label('codification_periode_id', 'Période De Condification <em class="text text-danger">*</em>', ['class' => 'col-md-2 col-sm-2 control-label'], false) !!}
                                <div class="col-md-6 col-sm-10">
                                    {!! Form::select('codification_periode_id', $codification_periode, old('codification_periode_id'), ['class' => 'form-control', 'id' => 'codification_periode_id', 'required' => 'required']) !!}

                                    @if ($errors->has('codification_periode_id'))
                                        <div class="help-block">
                                            @foreach($errors->get('codification_periode_id') as $message)
                                                <strong>{{ $message }}</strong>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group  {{ $errors->has('student_id') ? ' has-error' : '' }}">
                                {!!  Form::label('student_id', 'Étudiant <em class="text text-danger">*</em>', ['class' => 'col-md-2 col-sm-2 control-label'], false) !!}
                                <div class="col-md-6 col-sm-10">
                                    {!! Form::select('student_id', $student, old('student_id'), ['class' => 'form-control', 'id' => 'student_id', 'required' => 'required']) !!}

                                    @if ($errors->has('student_id'))
                                        <div class="help-block">
                                            @foreach($errors->get('student_id') as $message)
                                                <strong>{{ $message }}</strong>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group  {{ $errors->has('position_id') ? ' has-error' : '' }}">
                                {!!  Form::label('position_id', 'Position <em class="text text-danger">*</em>', ['class' => 'col-md-2 col-sm-2 control-label'], false) !!}
                                <div class="col-md-6 col-sm-10">
                                    {!! Form::select('position_id', $positions, old('position_id'), ['class' => 'form-control', 'id' => 'position_id', 'placeholder' => 'Sélectionnez une position...', 'required' => 'required', 'autofocus' => 'on']) !!}

                                    @if ($errors->has('position_id'))
                                        <div class="help-block">
                                            @foreach($errors->get('position_id') as $message)
                                                <strong>{{ $message }}</strong>
                                            @endforeach
                                        </div>
                                    @endif
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

                                {!! Form::open(['route' => ['student.reservations.destroy', $reservation->id], 'method' => 'delete', 'class' => 'form-inline', 'id' => 'form-delete']) !!}
                                {!! Form::token() !!}
                                {!! Form::hidden('id', $reservation->id) !!}
                                <div class="col-md-2 col-sm-3">
                                    <span class="btn btn-danger" id="button-delete" data-toggle="tooltip" data-placement="top" title="Supprimer"><i class="fa fa-trash"></i> Supprimer</span>
                                </div>
                                {!! Form::close() !!}

                                <div class="col-md-2 col-sm-2">
                                    <a href="{{ route('student.reservations.show', ['id' => $reservation->id]) }}"><span class="btn btn-default" id="button-show" data-toggle="tooltip" data-placement="top" title="Détails"><i class="fa fa-eye"></i> Détails</span></a>
                                </div>
                                <div class="col-md-2 col-md-offset-0 col-sm-4 col-sm-offset-1">
                                    <a href="{{ route('student.reservations.index') }}"><div class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Liste des réservations"><i class="fa fa-list"></i> Liste des réservations</div></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
            var form_delete = $('#form-delete'), button_delete = $('#button-delete')[0], title = 'Êtes-vous sûr de vouloir supprimer cette réservation?', text = 'Vous ne pourrez plus la récuperer!';
            handleDeleteForm(form_delete, button_delete, title, text);
        });
    </script>
@endpush