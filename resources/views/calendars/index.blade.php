@extends('front_master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-2">Calendar</h1>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="col-md-10 pb-5">        
        <div class="card card-success">
            <div class="card-body">
                <div id="calendar"></div>
            </div>
        </div>
    </div>
</div>
@push('js')
<script>
    $(function (){           
        var Calendar = FullCalendar.Calendar;
        var calendarEl = document.getElementById('calendar');
        
        // console.log(announcement);
        var calendar = new Calendar(calendarEl, {
            headerToolbar: {
                left  : 'prev,next today',
                center: 'title',
                right : 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            themeSystem: 'bootstrap',
        });
        calendar.render();
    });
    
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}"
    toastr.options.progressBar = true;
    switch (type){
    case 'info':
        toastr.info("{{Session::get('message')}}");
        break;

    case 'success':
        toastr.success("{{Session::get('message')}}");
        break;

    case 'warning':
        toastr.warning("{{Session::get('message')}}");
        break;
    
    case 'error':
        toastr.error("{{Session::get('message')}}");
        break;  
    }
    @endif
</script>
@endpush
@endsection