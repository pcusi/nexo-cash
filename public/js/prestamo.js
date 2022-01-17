const cuotaSelect = document.querySelector('#cuota');
const plazoSelect = document.querySelector('#plazo');
const cuotaTotal = document.querySelector('#total');
const interes = document.querySelector('#interes');
const toastTitle = document.querySelector('#toast-title');
const toastTitleError = document.querySelector('#toast-title-error');

let montoId = 0;
let plazoId = 0;

$(document).ready(function () {
    loadAmounts();
    loadTimes();

    cuotaSelect.addEventListener('change', () => {
        const cuotaVal = cuotaSelect.value;
        montoId = cuotaVal;
    });

    plazoSelect.addEventListener('change', () => {
        const plazoVal = plazoSelect.value;
        plazoId = plazoVal;
    });

    $('#calcular-btn').click(() => {
        const response = {
            'idmonto': montoId,
            'idplazo': plazoId
        }

        getTotal(response);
    });

    $('#btn-enviar').click(() => {
        sendApplication();
        return false;
    });

});

function loadAmounts() {
    $.ajax({
        type: 'GET',
        url: 'controller/montos.php',
        cache: false,
        success: function (data) {
            const montos = JSON.parse(data);

            let optionTemplate = '<option selected disabled>Seleccione un monto</option>'

            montos.forEach(monto => {
                optionTemplate += `<option value="${monto.id}">S/. ${monto.monto}</option>`
            });

            cuotaSelect.innerHTML = optionTemplate;
        }
    });
}

function loadTimes() {
    $.ajax({
        type: 'GET',
        url: 'controller/plazos.php',
        cache: false,
        success: function (data) {

            const plazos = JSON.parse(data);

            let optionTemplate = '<option selected disabled>Seleccione un plazo</option>'

            plazos.forEach(plazo => {

                let time = plazo.plazo == 1 ? `${plazo.plazo} año` : `${plazo.plazo} años`;

                optionTemplate += `<option value="${plazo.id}">${time}</option>`
            });

            plazoSelect.innerHTML = optionTemplate;
        }
    });
}

function getTotal(response) {
    $.ajax({
        type: 'POST',
        url: 'controller/montos.php',
        data: response,
        cache: false,
        success: function (data) {
            const calc = JSON.parse(data);
            calc.forEach(c => {
                cuotaTotal.innerHTML = `S/. ${c.total}`;
                interes.innerHTML = `${c.interes}%`;
            });
        },
    });
}

function sendApplication() {

    let correo = $('#correo').val();
    let dni = $('#dni').val();
    let telefono = $('#telefono').val();
    let monto = $('#monto').val();
    let ingreso = $('#ingreso').val();
    let valorPropiedad = $('#valorpropiedad').val();
    let ubicacionPropiedad = $('#ubicacionpropiedad').val();
    
    if (correo == '' || dni == '' || telefono == '' || monto == '' ||
        ingreso == '' || valorPropiedad == '' || ubicacionPropiedad == '') {

        $('#toast-error').css('visibility', 'visible');
        toastTitleError.innerHTML = 'Debe rellenar todos los campos.';

        setTimeout(() => {
            $('#toast-error').css('visibility', 'hidden');
        }, 4000);

    } else if (valorPropiedad < 100000) {
        $('#toast-error').css('visibility', 'visible');
        toastTitleError.innerHTML = 'El monto de la propiedad, no debe ser menor a S/. 100,000.';

        setTimeout(() => {
            $('#toast-error').css('visibility', 'hidden');
        }, 4000);

    } else if (dni.length > 8 || dni.length < 8) {
        $('#toast-error').css('visibility', 'visible');
        toastTitleError.innerHTML = 'El dni solo es de 8 dígitos.';

        setTimeout(() => {
            $('#toast-error').css('visibility', 'hidden');
        }, 4000);



    } else if (telefono.length > 9 || telefono.length < 9) {

        $('#toast-error').css('visibility', 'visible');
        toastTitleError.innerHTML = 'El télefono solo es de 9 dígitos.';

        setTimeout(() => {
            $('#toast-error').css('visibility', 'hidden');
        }, 4000);

    } else if (monto < 20000) {


        $('#toast-error').css('visibility', 'visible');
        toastTitleError.innerHTML = 'El monto prestado, no debe ser menor a S/. 20,000.';

        setTimeout(() => {
            $('#toast-error').css('visibility', 'hidden');
        }, 4000);

    } else {

        let form = $('#form-prestamo').serialize();

        $.ajax({
            type: 'POST',
            url: 'controller/prestamo.php',
            cache: false,
            data: form,
            success: function (response) {
                $('#toast').css('visibility', 'visible');
                toastTitle.innerHTML = 'Tu solicitud de préstamo ha sido enviado.';
                $('#form-prestamo').trigger('reset');
                setTimeout(() => {
                    $('#toast').css('visibility', 'hidden');
                }, 4000);
            }
        });
    }

}