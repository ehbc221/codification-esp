@extends('layouts.student')

@section('content')
    <div class="row">
        <div class="col-md-12">
            DASHBOARD
            {{ session('info') }}
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        /*
            HANDLE ALERTS (SUCCESS + ERROR)
         */
        var has_alert_info = "<?php echo $info ?>", message_info = "<?php echo $info; ?>";
        console.log('OK ' + message_info);
        handleAlerts(has_alert_info, 'info', message_info);
    </script>
@endpush