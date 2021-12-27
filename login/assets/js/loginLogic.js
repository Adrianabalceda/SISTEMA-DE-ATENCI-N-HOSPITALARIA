const btnAsegurado = document.getElementById('btnAsegurado');
const btnDoctor = document.getElementById('btnDoctor');
const btnAdmin = document.getElementById('btnAdmin');
const containerBtnRoles = document.getElementById('containerBtnRoles')
const titleLoginPage = document.getElementById('titleLoginPage');
const textLoginPage = document.getElementById('textLoginPage');
const containerLoginPageRight = document.getElementById('containerLoginPageRight');
const volver = document.getElementById('volver');
const form = document.querySelector('.formulario');
const id = document.getElementById('id');
const password = document.getElementById('password');
const frmname = document.getElementById('frmname');
const btnIngresar = document.getElementById('btnIngresar');
const urlParams = new URLSearchParams(window.location.search);

document.addEventListener('DOMContentLoaded', () => {

    if (urlParams.get('error') == '1') {
        showError('El ID o la contraseña son incorrectos');
    }

    btnAsegurado.addEventListener('click', showLogin);

    btnDoctor.addEventListener('click', showLogin);

    btnAdmin.addEventListener('click', showLogin);

    volver.addEventListener('click', volverAccion);

    btnIngresar.addEventListener('click', validateForm);
})

const showError = (error) => {
    swal.fire({
        title: 'Error',
        text: error,
        icon: 'error',
        confirmButtonText: 'Aceptar',
        confirmButtonColor: '#48BB78'
    })
}

const showLogin = (e) => {
    const idBtn = e.currentTarget.id;
    containerBtnRoles.classList.add('d-none');
    titleLoginPage.textContent = 'Iniciar Sesión';
    textLoginPage.textContent = 'Bienvenido, coloque su ID y Contraseña';

    form.classList.remove('d-none');

    if (idBtn.includes('Asegurado')) {
        form.setAttribute('id', 'formAsegurado');
        frmname.setAttribute('value', 'asegurado');
    }
    else if (idBtn.includes('Doctor')) {
        form.setAttribute('id', 'formDoctor');
        frmname.setAttribute('value', 'doctor');
    }
    else {
        form.setAttribute('value', 'formAdmin');
        frmname.setAttribute('value', 'administrador');
    }

    showVolver();
}

const showVolver = () => {
    volver.classList.remove('d-none');
}

const volverAccion = () => {
    form.classList.add('d-none');
    volver.classList.add('d-none');
    containerBtnRoles.classList.remove('d-none');
}

const validateForm = (e) => {
    e.preventDefault();
    const idValue = id.value;
    const passwordValue = password.value;

    if (idValue === '' || passwordValue === '') {
        swal.fire({
            title: 'Error',
            text: 'Debe completar todos los campos',
            icon: 'error',
            confirmButtonText: 'Aceptar',
            confirmButtonColor: '#48BB78'
        })
        return;
    }

    if (!idValue.match(/^[0-9]+$/)) {
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
}

