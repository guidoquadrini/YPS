/* 
 Nombre del Archivo: frmPacientes.js
 Fecha de Creacino:  07-03-2014
 Autor del Codigo : Guido Nicolas Quadrini
 Descripcion:
 Este archivo contiene el codigo complementario JS para el archivo frmPacientes.php
 */

function BorrarTurno() {
    var parametros = {
        'id': $("#idEventoDetalle").html()
    };
    $.ajax({
        data: parametros,
        url: 'Turnos/BorrarTurno.php',
        type: 'post',
        beforeSend: function() {

        },
        success: function(response) {
            $('#ModalEventoShow').modal('hide');
            mensaje('info', response, 2000)
            renderCalendar();
        }
    });
}
;
function guardarTurno() {
    var parametros = {
        'idPac': $('#idSel').html(),
        'FechaHoraIni': $('#FecTurno').val() + ' ' + $('#HorTurnoIni').val(),
        'FechaHoraFin': $('#FecTurno').val() + ' ' + $('#HorTurnoFin').val(),
        'idProf': $('#comboProfesionales').val(),
        'idEspecialidad': $('#comboEspecialidades').val(),
        'idTpoCons': $('#comboTipoConsulta').val(),
        'Observaciones': $('#observaciones').val(),
        'PrecioActual': $('#precioActual').attr('value'),
        'asistio': 0,
        'debe': 0,
        'sobreTurno': 0,
        'idObraSocial': $('#idObraSocial').attr('value'),
        'estado': 'activo'
    }
    ;
    $.ajax({
        data: parametros,
        url: 'Turnos/grabaTurnos.php',
        type: 'post',
        beforeSend: function() {

        },
        success: function(response) {
            $('#ModalEvento').modal('hide');
            mensaje('info', response, 2000)

        }
    });
    calendar.fullCalendar('renderEvent',
            {
                title: 'Turno Asignado.',
                start: $('#FecTurno').val() + ' ' + $('#HorTurnoIni').val(),
                end: $('#FecTurno').val() + ' ' + $('#HorTurnoFin').val(),
                allDay: 0
            },
    true // make the event "stick"
            );

    calendar.fullCalendar('unselect');
    renderCalendar();
}
;


function selUsuarioEvento(id) {
    var idUsuario = ($('#usr' + id).attr('id')).substring(3, ($('#usr' + id).attr('id')).length);
    var imagen = $('#usr' + id).children('#fotoBusqueda').attr('src');
    var nombre = $('#nombreCompBusq' + id).html();
    var obraSocialID = $('#idOSBusq' + id).text();
    var obraSocialTXT = $('#nomOSBusq' + id).html();
    $('#imgSel').attr('src', imagen);
    $('#idSel').html(idUsuario);
    $('#nomapeSel').html(nombre);
    $('#idObraSocial').attr('value', obraSocialID);
    $('#nomObraSocial').html(obraSocialTXT);
    $('#usrOS' + id).html();
    $("#grillaPacientes").css('display', 'none');
}
;

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


// page is now ready, initialize the calendar...
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
            left: 'prev,next, today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay',
        },
        slotMinutes: 15,
        slotDuration: '00:15:00',
        aspectRatio: 2.5,
        snapMinutes: 15,
        defaultEventMinutes: 15,
        minTime: '08:00',
        maxTime: '21:00',
        timezone: 'local',
        defualtView: 'agendaWeek',
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
            limpiaEventoDetalle;
            $.ajax({
                type: "POST",
                url: "Turnos/BuscarEvento.php",
                data: "&id=" + event.id,
                success: function(evento) {
                    temp = JSON.parse(evento);
                    $("#idEventoDetalle").html(temp.id);
                    $("#TituloEventoDetalle").html(temp.titulo);
                    $("#ProEventoDetalle").html(temp.Pro);
                    $("#EspEventoDetalle").html(temp.Esp);
                    $("#OSEventoDetalle").html(temp.OS);
                    $("#TpoConsEventoDetalle").html(temp.TpoCons);
                    $("#PrecioEventoDetalle").html(temp.Precio.toString());
                    $("#FecEventoDetalle").html(temp.Fec.toString());
                    $("#HorIniEventoDetalle").html(temp.HorIni.toString());
                    $("#HorFinEventoDetalle").html(temp.HorFin.toString());
                    $("#ObsEventoDetalle").html(temp.Obs);
                }
            });
            $('#ModalEventoShow').modal('show');
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
limpiaEventoDetalle = function() {
    $("#idEventoDetalle").html('');
    $("#TituloEventoDetalle").html('');
    $("#ProEventoDetalle").html('');
    $("#EspEventoDetalle").html('');
    $("#OSEventoDetalle").html('');
    $("#TpoConsEventoDetalle").html('');
    $("#PrecioEventoDetalle").html('');
    $("#FecEventoDetalle").html('');
    $("#HorIniEventoDetalle").html('');
    $("#HorFinEventoDetalle").html('');
    $("#ObsEventoDetalle").html('');
};