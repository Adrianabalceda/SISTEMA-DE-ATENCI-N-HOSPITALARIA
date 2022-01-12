const btnRegistrar = document.getElementById('btnRegistrar');
const urlParams = new URLSearchParams(window.location.search);
const nombres = document.getElementById('paciente');
const apellidos = document.getElementById('descripcion');
const celular = document.getElementById('fecha');
const email = document.getElementById('hora');
const a = document.getElementById('cama');
const b = document.getElementById('especialidad');



const form = document.querySelector('.formulario');
document.addEventListener('DOMContentLoaded', () => {

    

    if (urlParams.get('mensaje') == '1') {
        showGod('Se registro correctamente');
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
    const celularValue = celular.value;
    const emailValue = email.value;
    const aValue =a.value; 
const bValue =b.value; 

    if (nombresValue === '' || apellidosValue === '' || celularValue === '' || emailValue === '' || aValue === ''|| bValue === '') {
        swal.fire({
            title: 'Error',
            text: 'Debe completar todos los campos',
            icon: 'error',
            confirmButtonText: 'Aceptar',
            confirmButtonColor: '#48BB78'
        })
        return;
    }

 

    form.submit();
    form.reset();
}