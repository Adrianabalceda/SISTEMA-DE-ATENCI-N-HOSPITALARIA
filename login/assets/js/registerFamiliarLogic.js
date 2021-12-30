const btnRegistrar = document.getElementById('btnRegistrar');
const urlParams = new URLSearchParams(window.location.search);
const nombres = document.getElementById('nombresFamiliar'); 
const apellidos = document.getElementById('apellidosFamiliar');
const dni = document.getElementById('dniFamiliar');
const idasegurado = document.getElementById('dniasegurado');
const email = document.getElementById('email');
const fecha = document.getElementById('fecha');


const form = document.querySelector('.formulario');
document.addEventListener('DOMContentLoaded', () => {

    if (urlParams.get('error') == '1') {
        showError('Ya existen usuarios registrados con ese DNI');
    }


    if (urlParams.get('mensaje') == '1') {
        showGod('El familiar fue añadido exitosamente');
    }

    btnRegistrar.addEventListener('click', validateForm);
})



const showError = (error) => {
    swal.fire({
        text: error,
        icon: 'error',
        confirmButtonText: 'Aceptar',
        confirmButtonColor: '#48BB78'
    })
}

const showGod = (error) => {
    swal.fire({
        text: error,
        icon: 'success',
        confirmButtonText: 'Aceptar',
        confirmButtonColor: '#48BB78'
    })
}

const validateForm = (e) => {
    e.preventDefault();
    const nombresValue = nombres.value;
    const apellidosValue = apellidos.value;
    const idaseguradoValue =idasegurado.value;
    const dniValue = dni.value;
    const emailValue = email.value;
    const fechaValue = fecha.value;

    if (nombresValue == '' || apellidosValue == '' || dniValue == '' || emailValue == "" 
        || fechaValue == ''|| idaseguradoValue == '') {
        swal.fire({
            title: 'Error',
            text: 'Debe completar todos los campos',
            icon: 'error',
            confirmButtonText: 'Aceptar',
            confirmButtonColor: '#48BB78'
        })
        return;
    }

    if (!dniValue.match(/^[0-9]+$/) ) {
        swal.fire({
            title: 'Error',
            text: 'El ID debe ser un número',
            icon: 'error',
            confirmButtonText: 'Aceptar',
            confirmButtonColor: '#48BB78'
        })
        return;
    }

    form.submit();
    form.reset();
}