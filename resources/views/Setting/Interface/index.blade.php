@extends('Layouts/master')
@section('header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />

<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" /> -->
@stop
@section('content');
<div class="main">
    <div class="main-container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                        </div>
                        <div class="panel-body">
                            <h2 align="center"><a href="#">Kalendar</a></h2>
                            <div class="container">

                                <div id="calendar"></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('footer')
<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>
<!-- kalendar -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
<script>
    $(document).ready(function() {
        //ganti ke class supaya bisa banyak 
        $('.role').editable();
    });
    // kalendar
    $(document).ready(function() {

        var calendar = $('#calendar').fullCalendar({

            editable: true,

            header: {

                left: 'prev,next today',

                center: 'title',

                right: 'month,agendaWeek,agendaDay'

            },

            events: 'load.php',

            selectable: true,

            selectHelper: true,

            // Insert

            select: function(start, end, allDay) {

                var title = prompt("Enter Event Title");

                if (title) {

                    var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");

                    var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");

                    $.ajax({

                        url: "insert.php",

                        type: "POST",

                        data: {
                            title: title,
                            start: start,
                            end: end
                        },

                        success: function() {

                            calendar.fullCalendar('refetchEvents');

                            alert("Event Berhasil Ditambahkan!");

                        }

                    })

                }

            },

            // Event Update

            editable: true,

            eventResize: function(event) {

                var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");

                var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");

                var title = event.title;

                var id = event.id;

                $.ajax({

                    url: "update.php",

                    type: "POST",

                    data: {
                        title: title,
                        start: start,
                        end: end,
                        id: id
                    },

                    success: function() {

                        calendar.fullCalendar('refetchEvents');

                        alert('Event Berhasil Di Update');

                    }

                })

            },

            eventDrop: function(event) {

                var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");

                var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");

                var title = event.title;

                var id = event.id;

                $.ajax({

                    url: "update.php",

                    type: "POST",

                    data: {
                        title: title,
                        start: start,
                        end: end,
                        id: id
                    },

                    success: function() {

                        calendar.fullCalendar('refetchEvents');

                        alert("Event Berhasil Di Update");

                    }

                });

            },

            // Event Click Hapus

            eventClick: function(event) {

                if (confirm("Apakah yaki ingin dihapus?")) {

                    var id = event.id;

                    $.ajax({

                        url: "delete.php",

                        type: "POST",

                        data: {
                            id: id
                        },

                        success: function() {

                            calendar.fullCalendar('refetchEvents');

                            alert("Event Berhasil di Hapus");

                        }

                    })

                }

            }

        });

    });
</script>
@stop