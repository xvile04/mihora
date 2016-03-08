var horarios = ['manana', 'tarde'];
var semana = ['lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo'];

$(document).ready(function () {
    semana.forEach(function (dia) {
        horarios.forEach(function (horario) {
            switchTime($('#empleadoshorarios-' + dia + '_' + horario).bootstrapSwitch('state'), horario + '_' + dia);
        })
    });
});

function switchTime(estado, horario) {
    $('input[name="EmpleadosHorarios[abertura_' + horario + ']"]').prop('disabled', !estado);
    $('input[name="EmpleadosHorarios[cierre_' + horario + ']"]').prop('disabled', !estado);
}

