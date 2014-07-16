<?php $def = 'sacar_turno'; ?>
<?php $img = base_url() . 'assets/images/views/' . $def . '/'; ?>
<?php $css = base_url() . 'assets/styles/views/' . $def . '/'; ?>
<?php $js = base_url() . 'assets/scripts/views/' . $def . '/'; ?>
<?php $base = base_url() . 'index.php/' . $def . '/'; ?>
<?php $base_cal = base_url() . 'assets/fullcalendar/'; ?>
<html>
    <head>
        <link  href="<?php echo $css . 'bootstrap.css'; ?>" rel="stylesheet">
        <link  href="<?php echo $base_cal . 'fullcalendar.css' ?>" rel='stylesheet' />
        <link  href="<?php echo $base_cal . 'fullcalendar.print.css' ?>" rel='stylesheet' media='print' />
        <script src="<?php echo $base_cal . 'lib/moment.min.js' ?>"></script>
        <script src="<?php echo $base_cal . 'lib/jquery.min.js' ?>"></script>
        <script src="<?php echo $base_cal . 'lib/jquery-ui.custom.min.js' ?>"></script>
        <script src="<?php echo $base_cal . 'fullcalendar.js' ?>"></script>
        <script src="<?php echo $base_cal . '/lang/es.js' ?>"></script>

        <script>
            function renderCalendar() {
                var date = new Date();
                var d = date.getDate();
                var m = date.getMonth();
                var y = date.getFullYear();
                var inical = ((y - 1) + '-' + m + '-' + d);
                var fincal = ((y + 1) + '-' + m + '-' + d);
                var diasLaborales = [0, 4, 5, 6];
                calendar = $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,today,next',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay',
                    },
                    hiddenDays: [6, 0],
                    slotMinutes: 15,
                    slotDuration: '00:30:00',
                    aspectRatio: 2.5,
                    snapMinutes: 15,
                    defaultEventMinutes: 15,
                    minTime: '08:00',
                    maxTime: '20:00',
                    timezone: 'local',
                    defaultView: 'agendaWeek',
                    defaultDate: y + '-' + m + '-' + d,
                    fistDay: 1,
                    //weekends: false,
                    // hiddenDays: diasLaborales, // hide Tuesdays and Thursdays
                    weekNumbers: false,
                    editable: true,
                    selectable: true,
                    selectHelper: true,
                    lang: 'es',
                    droppable: true, // this allows things to be dropped onto the calendar !!!
                    eventDrop: function(event) {

                        var FecHorIni = fechaHora(event.start);
                        var FecHorFin = fechaHora(event.end);
                        var start = FecHorIni[0] + ' ' + FecHorIni[1];
                        var end = FecHorFin[0] + ' ' + FecHorFin[1];

                        $.ajax({
                            url: 'Turnos/DropTurno.php',
                            data: 'start=' + start + '&end=' + end + '&id=' + event.id,
                            type: "POST",
                            success: function(json) {
                                console.log(json);
                                mensaje('info', "Evento actualizado correctamente...", 2000)
                            }
                        })
                    },
                    eventResize: function(event) {
                        var FecHorIni = fechaHora(event.start);
                        var FecHorFin = fechaHora(event.end);
                        var start = FecHorIni[0] + ' ' + FecHorIni[1];
                        var end = FecHorFin[0] + ' ' + FecHorFin[1];
                        $.ajax({
                            url: 'Turnos/DropTurno.php',
                            data: 'start=' + start + '&end=' + end + '&id=' + event.id,
                            type: "POST",
                            success: function(json) {
                                mensaje('info', json, 2000)
                                mensaje('info', "Evento actualizado correctamente...", 2000)
                            }
                        })

                    },
                    select: function(start, end, allDay) {
                        var FecHorIni = fechaHora(start);
                        var FecHorFin = fechaHora(end);
                        $('#ModalEvento').modal('show');
                        //Se utilizo la funcino fechaHora() para ajustar los horarios con los controles del formulario.
                        $('#FecTurno').val(FecHorIni[0]);
                        $('#HorTurnoIni').val(FecHorIni[1]);
                        $('#HorTurnoFin').val(FecHorFin[1]); //Hora de finalizacion por defecto.                            
                    },
                    eventClick: function(event) {
                        window.location="sacar_turno/RegistroDeTurno"
//                        limpiaEventoDetalle;
//                        $.ajax({
//                            type: "POST",
//                            url: "Turnos/BuscarEvento.php",
//                            data: "&id=" + event.id,
//                            success: function(evento) {
//                                temp = JSON.parse(evento);
//                                $("#idEventoDetalle").html(temp.id);
//                                $("#TituloEventoDetalle").html(temp.titulo);
//                                $("#ProEventoDetalle").html(temp.Pro);
//                                $("#EspEventoDetalle").html(temp.Esp);
//                                $("#OSEventoDetalle").html(temp.OS);
//                                $("#TpoConsEventoDetalle").html(temp.TpoCons);
//                                $("#PrecioEventoDetalle").html(temp.Precio.toString());
//                                $("#FecEventoDetalle").html(temp.Fec.toString());
//                                $("#HorIniEventoDetalle").html(temp.HorIni.toString());
//                                $("#HorFinEventoDetalle").html(temp.HorFin.toString());
//                                $("#ObsEventoDetalle").html(temp.Obs);
//                            }
//                        });
//                        $('#ModalEventoShow').modal('show');
                    },
                    eventSources:
                            [
                                {
                                    url: 'Turnos/fullcalendar/php/get-events.php',
                                    type: 'POST',
                                    data: {
                                        start: inical,
                                        end: fincal,
                                        timezone: 'America/Argentina/Buenos_Aires'
                                    },
                                    error: function() {
                                        mensaje('alert', "Error mientras se cargaban los turnos...", 2000)
                                    }
                                }
                                // Posibilidad de cargar otras fuentes de eventos...
                            ]
                });
            }
            ;
            $(document).ready(function() {
                renderCalendar();
            });
        </script>
        <style>

            body {
                margin: 0;
                padding: 0;
                font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
                font-size: 14px;
            }

            #calendar {
                width: 900px;
                margin: 40px auto;
            }

        </style>
    </head>
    <body>
        <div class="container" style="padding-top: 20px;">
            <div class="row">
                <div>
                    <!-- Default panel contents -->
                    <img style="float:left;padding-right:15px;" src="<?php echo $img . 'botiquin.jpg' ?>">
                    <h2 class="form-signin-heading" style="margin-top:0px; font-family: 'Gloria Hallelujah', cursive !important; ">Sacar turno</h2>
                    <legend class="form-signin-heading" style="margin-top:0px; font-family: 'Gloria Hallelujah', cursive !important; ">Seleccione un Turno:</legend>

                    <div class="panel-body" style="margin-top:-40px; padding-top:0px;">
                        <form id="" name="" method="POST">
                            <!--                            <div id="mensaje"></div>-->
                            <div class="row">     
                                <div id="calendar"></div>
                            </div>                                     
                        </form>
                    </div>
                </div>
                <div class="row" style="margin: 10px auto; width:960px;">
                    <div class="col-md-6">
                        <!--   <h2 class="form-signin-heading" style="margin-top:0px; font-family: 'Gloria Hallelujah', cursive !important; ">Sacar turno</h2>-->
                        <legend class="form-signin-heading" style="margin-top:0px; font-family: 'Gloria Hallelujah', cursive !important; ">Buscar Proximo Turno Disponible:</legend>
                        <div class="btn-group btn-group-justified">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default">Cualquier Profesional</button>
                            </div>  
                            <div class="btn-group">
                                <button type="button" class="btn btn-default">Mismo Profesional</button>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div style="float:right;">
                            <?= form_button('btn_cancelar', 'Volver', 'class="btn btn-lg btn-danger" onclick="window.history.back(-1)"')
                            ?>
                            <?= form_button('btn_cancelar', 'Cancelar', 'class="btn btn-lg btn-danger" onclick="window.history.back(-1)"')
                            ?>
                            <?=
                            form_button([
                                'content' => 'Aceptar',
                                'type' => 'submit',
                                'class' => 'btn btn-lg btn-primary'
                            ])
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>