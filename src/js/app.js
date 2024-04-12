document.addEventListener('DOMContentLoaded', function () {

    eventListeners();

    darkmode();

    validarVendedores();
});

function darkmode() {

    const preferenciaUsuario = window.matchMedia('(prefers-color-scheme: dark)');

    function establecerTema(preferencia) {
        if (preferencia === 'dark') {
            document.body.classList.add('dark-mode');
            localStorage.setItem('tema', 'dark');
        } else {
            document.body.classList.remove('dark-mode');
            localStorage.setItem('tema', 'light');
        }
    }

    const preferencia = localStorage.getItem('tema');

    if (preferencia === null) {
        establecerTema(preferenciaUsuario.matches ? 'dark' : 'light');
    } else {
        establecerTema(preferencia);
    }

    preferenciaUsuario.addEventListener('change', function () {
        if (preferenciaUsuario.matches) {
            document.body.classList.add('dark-mode');
            localStorage.setItem('tema', 'dark');
        } else {
            document.body.classList.remove('dark-mode');
            localStorage.setItem('tema', 'light');
        }
    });

    const botonDarkMode = document.querySelector('.dark-mode-boton');
    botonDarkMode.addEventListener('click', function () {
        document.body.classList.toggle('dark-mode');

        if (document.body.classList.contains('dark-mode')) {
            localStorage.setItem('tema', 'dark');
        } else {
            localStorage.setItem('tema', 'light');
        }
    });
}

function eventListeners() {
    const menuResponsive = document.querySelector('.menu-responsive');

    menuResponsive.addEventListener('click', navegacionResponsive);

    // Mostrar campos de manera condicional

    const radios = document.querySelectorAll('input[type="radio"][name="contacto[contacto]"]');

    radios.forEach(input => {
        input.addEventListener('click', mostrarMetodo);
    });
}

function navegacionResponsive() {
    const navegacion = document.querySelector('.navegacion');

    navegacion.classList.toggle('mostrar');
}

function mostrarMetodo(e) {
    const divContacto = document.querySelector('#contacto');
    const metodo = e.target.value;

    divContacto.innerHTML = '';


    if (metodo === 'telefono') {
        const labelTel = document.createElement('label');
        const inputTel = document.createElement('input');
        labelTel.setAttribute('for', 'telefono');
        labelTel.textContent = 'Número de Teléfono';
        inputTel.type = 'tel';
        inputTel.id = 'telefono';
        inputTel.name = 'contacto[telefono]';
        inputTel.placeholder = 'Escribe tu número de teléfono.';
        inputTel.ariaLabel = 'Teléfono';
        inputTel.required = true;
        const campoTel = document.createElement('DIV');
        campoTel.classList.add('campo');
        campoTel.appendChild(labelTel);
        campoTel.appendChild(inputTel);

        const labelFecha = document.createElement('label');
        labelFecha.setAttribute('for', 'fecha');
        labelFecha.textContent = 'Fecha';
        const fechaActual = new Date().toISOString().split('T')[0];
        const fechaInput = document.createElement('input');
        fechaInput.type = 'date';
        fechaInput.name = 'contacto[fecha]';
        fechaInput.id = 'fecha';
        fechaInput.ariaLabel = 'Fecha';
        fechaInput.min = fechaActual;
        fechaInput.required = true;
        const campoFecha = document.createElement('DIV');
        campoFecha.classList.add('campo');
        campoFecha.appendChild(labelFecha);
        campoFecha.appendChild(fechaInput);

        fechaInput.addEventListener('change', function() {
            const fechaSeleccionada = this.value;
            
            // Si la fecha seleccionada es anterior a la fecha actual, establecerla como la fecha actual
            if (fechaSeleccionada < fechaActual) {
                this.value = fechaActual;
            }
        });
            
        const labelHora = document.createElement('label');
        labelHora.setAttribute('for', 'hora');
        labelHora.textContent = 'Hora';
        const horaInput = document.createElement('input');
        horaInput.type = 'time';
        horaInput.id = 'hora';
        horaInput.name = 'contacto[hora]';
        horaInput.min = '08:00';
        horaInput.max = '18:00';
        horaInput.ariaLabel = 'Hora';
        horaInput.required = true;
        const campoHora = document.createElement('DIV');
        campoHora.classList.add('campo');
        campoHora.appendChild(labelHora);
        campoHora.appendChild(horaInput);

        divContacto.appendChild(campoTel);
        divContacto.appendChild(campoFecha);
        divContacto.appendChild(campoHora);

    } else {
        const labelEmail = document.createElement('label');
        const inputEmail = document.createElement('input');
        labelEmail.setAttribute('for', 'email');
        labelEmail.textContent = 'Correo Electrónico';
        inputEmail.type = 'email';
        inputEmail.id = 'email';
        inputEmail.name = 'contacto[email]';
        inputEmail.placeholder = 'Escribe tú email.';
        inputEmail.ariaLabel = 'Email';
        inputEmail.required = true;
        const campoEmail = document.createElement('DIV');
        campoEmail.classList.add('campo');
        campoEmail.appendChild(labelEmail);
        campoEmail.appendChild(inputEmail);

        divContacto.appendChild(campoEmail);
    }
}

function validarVendedores() {
    const formVendedor = document.querySelector('#form-vendedor');
    const telefono = document.querySelector('#telefono');
    const email = document.querySelector('#email');
    const btnSubmit = document.querySelector('input[type="submit"]');

    let objForm = {
        telefono: '',
        email: '',
    };

    if (formVendedor) {
        telefono.addEventListener('input', leerDatos);
        email.addEventListener('input', leerDatos);

        objForm = {
            telefono: telefono.value,
            email: email.value,
        };
    }

    function leerDatos(e) {
        if (e.target.value.trim() === '') {
            mostrarAlerta(`El campo ${e.target.id} no puede estar vacio`, e.target.parentElement);
            objForm[e.target.id] = '';
            validarDatos();
            return;
        }
        if (e.target.id === 'telefono' && !validarTelefono(e.target.value)) {
            mostrarAlerta(`El telefono ${e.target.value}, no es válido.`, e.target.parentElement);
            objForm[e.target.id] = '';
            validarDatos();
            return;
        }
        if (e.target.id === 'email' && !validarEmail(e.target.value)) {
            mostrarAlerta(`El email ${e.target.value}, no es válido.`, e.target.parentElement);
            objForm[e.target.id] = '';
            validarDatos();
            return;
        }

        limpiarAlerta(e.target.parentElement);

        objForm[e.target.id] = e.target.value.trim().toLowerCase();

        validarDatos();
    }

    function mostrarAlerta(msj, ref) {
        limpiarAlerta(ref);
        const info = document.createElement('p');
        info.textContent = msj;
        info.classList.add('error');
        ref.appendChild(info);
    }

    function limpiarAlerta(ref) {
        const alerta = ref.querySelector('.error');
        if (alerta) {
            alerta.remove();
        }
    }

    function validarTelefono(telefono) {
        const regex = /^(\+57)?[2-9]{1}\d{9}$/;
        return regex.test(telefono);
    }
    function validarEmail(email) {
        const regex = /^[\p{L}\p{N}._%+-]+@[\p{L}\p{N}.-]+\.[\p{L}]{2,}$/u;
        return regex.test(email);
    }

    function validarDatos() {
        if (Object.values(objForm).includes('')) {
            btnSubmit.classList.add('opacidad-50');
            btnSubmit.disabled = true;
            return;
        }
        btnSubmit.classList.remove('opacidad-50');
        btnSubmit.disabled = false;
    }
}
