const btnRegistrar = document.getElementById('btnRegistrar');
const urlParams = new URLSearchParams(window.location.search);
const paciente = document.getElementById('paciente'); 
const camilla = document.getElementById('camilla'); 
const especialidad = document.getElementById('especialidad'); 
const fechaAsegurado = document.getElementById('fechaAsegurado');
const horaAsegurado = document.getElementById('horaAsegurado');
const descAsegurado = document.getElementById('descAsegurado');


const form = document.querySelector('.formulario');
document.addEventListener('DOMContentLoaded', () => {

    if (urlParams.get('error') == '1') {
        showError('Ya existe un usuario registrado con ese DNI');
    }

    if (urlParams.get('error') == '2') {
        showError('Ya existe en el sistema un usuario con este DNI');
    }

    if (urlParams.get('mensaje') == '1') {
        showGod('El usuario fue creado exitosamente');
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
    // validar la igualdad de los valores de los campos
    const pacienteValue = paciente.value;
    const camillaValue = camilla.value;
    const especialidadValue = especialidad.value;
    const fechaAseguradoValue = fechaAsegurado.value;
    const horaAseguradoValue = horaAsegurado.value;
    const descAseguradoValue = descAsegurado.value;

    if (pacienteValue == '' || camillaValue == '' || especialidadValue == '' || fechaAseguradoValue == '' 
        || horaAseguradoValue == '' || descAseguradoValue == '') {
        swal.fire({
            title: 'Error',
            text: 'Debe completar todos los campos',
            icon: 'error',
            confirmButtonText: 'Aceptar',
            confirmButtonColor: '#48BB78'
        })
        return;
    }

    // if (!dniAseguradoValue.match(/^[0-9]+$/) ) {
    //     swal.fire({
    //         title: 'Error',
    //         text: 'El ID debe ser un número',
    //         icon: 'error',
    //         confirmButtonText: 'Aceptar',
    //         confirmButtonColor: '#48BB78'
    //     })
    //     return;
    // }

    
    form.submit();
    form.reset();
}