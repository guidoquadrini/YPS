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
                    defaultDate: '<?= $fecha; ?>',
                    fistDay: 1,
                    //weekends: false,
                    // hiddenDays: diasLaborales, // hide Tuesdays and Thursdays
                    weekNumbers: false,
                    editable: false,
                    selectable: true,
                    selectHelper: true,
                    slotEventOverlap: false,
                    lang: 'es',
                    droppable: false, // this allows things to be dropped onto the calendar !!!
//                    eventDrop: function(event) {
//
//                        var FecHorIni = fechaHora(event.start);
//                        var FecHorFin = fechaHora(event.end);
//                        var start = FecHorIni[0] + ' ' + FecHorIni[1];
//                        var end = FecHorFin[0] + ' ' + FecHorFin[1];
//
//                        $.ajax({
//                            url: 'Turnos/DropTurno.php',
//                            data: 'start=' + start + '&end=' + end + '&id=' + event.id,
//                            type: "POST",
//                            success: function(json) {
//                                console.log(json);
//                                mensaje('info', "Evento actualizado correctamente...", 2000)
//                            }
//                        })
//                    },
//                    eventResize: function(event) {
//                        var FecHorIni = fechaHora(event.start);
//                        var FecHorFin = fechaHora(event.end);
//                        var start = FecHorIni[0] + ' ' + FecHorIni[1];
//                        var end = FecHorFin[0] + ' ' + FecHorFin[1];
//                        $.ajax({
//                            url: 'Turnos/DropTurno.php',
//                            data: 'start=' + start + '&end=' + end + '&id=' + event.id,
//                            type: "POST",
//                            success: function(json) {
//                                mensaje('info', json, 2000)
//                                mensaje('info', "Evento actualizado correctamente...", 2000)
//                            }
//                        })
//
//                    },
                    select: function(start, end, allDay) {
                        if ($("#id_turno").val() != "") {
                            $('#calendar').fullCalendar('removeEvents', 99)
                        }
                        var FecHorIni = fechaHora(start);
                        var FecHorFin = fechaHora(end);
                        var title = 'Su Turno';
                        var eventData;
                        eventData = {
                            id: 99,
                            title: title,
                            start: start,
                            end: end
                        };
                        $('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
                        $('#calendar').fullCalendar('unselect');
                        $("#id_turno").val('99');
                        $("#fecha_hora").val(start);
                        $("#btn_guardar").removeAttr("disabled");





                    },
                    eventClick: function(event) {


                        // window.location = "sacar_turno/RegistroDeTurno"
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
                            {
                                url: 'fullcalendar/get_events_db',
                                type: 'POST',
                                data: {
                                    start: inical,
                                    end: fincal,
                                    timezone: 'America/Argentina/Buenos_Aires',
                                    id: '<?= $id; ?>'
                                },
                                error: function() {
                                    alert('Error al carar las fuentes de datos.')
                                    //mensaje('alert', "Error mientras se cargaban los turnos...", 2000)
                                }
                            }
                    // Posibilidad de cargar otras fuentes de eventos...


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
                            <input type="button"  class="btn btn-lg btn-danger"  value="Volver"   id="btn_volver" />
                            <input type="button"  class="btn btn-lg btn-danger"  value="Cancelar" id="btn_cancelar"/>
                            <input type="button"  class="btn btn-lg btn-primary" value="Aceptar"  id="btn_guardar" disabled/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form action="http://localhost/yps/index.php/sacar_turno" method="post"       
              accept-charset="utf-8" role="form" name="frm_grilla" id="frm_grilla" >
            <input type="hidden"  id="estado" name="estado"/>
            <input type="hidden"  id="fecha_hora" name="fecha_hora"/>
            <input type="hidden"  id="id_turno" name="id_turno"/>

        </form>


        <script>
            $(document).ready(function() {



                $("#btn_guardar").click(function() {
                    estado(3);
                    $("#frm_grilla").submit();
                });

                $("#btn_volver").click(function() {
                    estado(0);
                    $("#frm_grilla").submit();
                });

                $("#btn_cancelar").click(function() {
                    estado(0);
                    window.location = '../../index.php';
                });
            });
            function estado(estado) {
                $("#estado").val(estado);
            }
            function fechaHora(start) {
//    alert(start);
                var newDate = new Date(start);
//    alert(newDate);

                var dia = ("0" + newDate.getDate()).slice(-2);
                var mes = ("0" + (newDate.getMonth() + 1)).slice(-2);
                var anio = newDate.getFullYear()
                var fecha = anio + '-' + mes + '-' + dia;
                var hora = ((newDate.getHours() < 10 ? '0' : '') + newDate.getHours()).slice(-2);
                var minutos = ((newDate.getMinutes() < 10 ? '0' : '') + newDate.getMinutes()).slice(-2);
                var segundos = ((newDate.getSeconds() < 10 ? '0' : '') + newDate.getSeconds()).slice(-2);
                var hms = hora + ':' + minutos + ':' + segundos;
                return new Array(fecha, hms);
            }
            ;
        </script>
    </body>
</html>