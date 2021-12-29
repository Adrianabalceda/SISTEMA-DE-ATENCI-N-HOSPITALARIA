const btnRegistrar = document.getElementById('btnRegistrar');
const urlParams = new URLSearchParams(window.location.search);
const nombresAsegurado = document.getElementById('nombresAsegurado'); 
const apellidosAsegurado = document.getElementById('apellidosAsegurado');
const dniAsegurado = document.getElementById('dniAsegurado');
const celularAsegurado = document.getElementById('celularAsegurado');
const emailAsegurado = document.getElementById('emailAsegurado');
const fechaAsegurado = document.getElementById('fechaAsegurado');


const form = document.querySelector('.formulario');
document.addEventListener('DOMContentLoaded', () => {

    if (urlParams.get('error') == '1') {
        showError('Ya existe un usuario registrado con ese DNI');
    }

    if (urlParams.get('error') == '2') {
        showError('Ya existe en el sistema un usuario con este DNI');
    }

    if (urlParams.get('mensaje') == '1') {
        showGod('El usuario fue modificado exitosamente');
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
    const nombresAseguradoValue = nombresAsegurado.value;
    const apellidosAseguradoValue = apellidosAsegurado.value;
    const dniAseguradoValue = dniAsegurado.value;
    const celularAseguradoValue = celularAsegurado.value;
    const emailAseguradoValue = emailAsegurado.value;
    const fechaAseguradoValue = fechaAsegurado.value;

    if (nombresAseguradoValue === '' || apellidosAseguradoValue === '' || dniAseguradoValue === '' || celularAseguradoValue === '' || emailAseguradoValue ==='' 
        || fechaAseguradoValue =='') {
        swal.fire({
            title: 'Error',
            text: 'Debe completar todos los campos',
            icon: 'error',
            confirmButtonText: 'Aceptar',
            confirmButtonColor: '#48BB78'
        })
        return;
    }

    if (!dniAseguradoValue.match(/^[0-9]+$/) ) {
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