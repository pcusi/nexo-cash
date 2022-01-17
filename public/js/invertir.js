const toastTitle = document.querySelector('#toast-title');
const toastTitleError = document.querySelector('#toast-title-error');


$(document).ready(function () {

    $('#btn-invertir').click(() => {
        invertir();
        return false;
    });

});

function invertir() {

    let correo = $('#correo').val();
    let dni = $('#dni').val();
    let nombres = $('#nombres').val();
    let apellidos = $('#apellidos').val();
    let inversion = $('#inversion').val();
    let ocupacion = $('#ocupacion').val();

    if (correo == '' || dni == '' || nombres == '' || apellidos == '' ||
        inversion == '' || ocupacion == '') {

        $('#toast-error').css('visibility', 'visible');
        toastTitleError.innerHTML = 'Debe rellenar todos los campos.';

        setTimeout(() => {
            $('#toast-error').css('visibility', 'hidden');
        }, 4000);

    } else if (dni.length > 8 || dni.length < 8) {

        $('#toast-error').css('visibility', 'visible');
        toastTitleError.innerHTML = 'El dni solo es de 8 dígitos.';

        setTimeout(() => {
            $('#toast-error').css('visibility', 'hidden');
        }, 4000);

    } else if (inversion < 20000) {

        $('#toast-error').css('visibility', 'visible');
        toastTitleError.innerHTML = 'El monto de inversión, no debe ser menor a S/. 20,000.';

        setTimeout(() => {
            $('#toast-error').css('visibility', 'hidden');
        }, 4000);

    } else {

        let form = $('#form-invertir').serialize();

        $.ajax({
            type: 'POST',
            url: 'controller/inversion.php',
            cache: false,
            data: form,
            success: function (response) {
                $('#toast').css('visibility', 'visible');
                toastTitle.innerHTML = 'Tu solicitud de inversión ha sido enviado.';
                $('#form-invertir').trigger('reset');
                setTimeout(() => {
                    $('#toast').css('visibility', 'hidden');
                }, 4000);
            },
        });
    }

}