const formulario = document.querySelector('.formulario.contacto');
const submit = document.querySelector('input[type="submit"]');
const forma = document.querySelectorAll('input[type="radio"][name="contacto[contacto]"]');
const nombre = document.querySelector('#nombre');
const mensaje = document.querySelector('#mensaje');
const opcion = document.querySelector('#opciones');
const presupuesto = document.querySelector('#presupuesto');

const spinner = document.querySelector('.spinner');

let objForm = {
    nombre: '',
    mensaje: '',
    opciones: '',
    presupuesto: '',
    email: '',
    telefono: '',
    fecha: '',
    hora: '',
};

if (formulario) {
    validarForm();

    formulario.addEventListener('submit', enviarForm);
}

function enviarForm(e) {
    e.preventDefault();
    spinner.classList.remove('hidden');

    setTimeout(() => {
        spinner.classList.add('hidden');
        this.submit();
    }, 3000);
    
}

function validarForm() {
    nombre.addEventListener('input', validarInput);
    mensaje.addEventListener('input', validarInput);
    opcion.addEventListener('blur', validarInput);
    presupuesto.addEventListener('input', validarInput);

    forma.forEach(radio => {
        radio.addEventListener('change', e => {

            if (e.target.value === 'telefono') {
                const telefono = document.querySelector('input[type="tel"][id="telefono"]');
                const fecha = document.querySelector('#fecha');
                const hora = document.querySelector('#hora');

                delete objForm.email;

                telefono.addEventListener('input', validarInput);
                fecha.addEventListener('blur', validarInput);
                hora.addEventListener('blur', validarInput);
            } else {
                const email = document.querySelector('input[type="email"][id="email"]');

                delete objForm.telefono;
                delete objForm.fecha;
                delete objForm.hora;

                email.addEventListener('input', validarInput);
            }

        });
    });
}

function validarInput(e) {
    if (e.target.value === '') {
        mostrarAlerta(`¡El campo ${e.target.id} no puede estar vacío!`, e.target.parentElement);
        objForm[e.target.id] = '';
        comprobarCorreo();
        return;
    }
    if (e.target.id === 'telefono' && !validarTelefono(e.target.value)) {
        mostrarAlerta(`El número ${e.target.value} no es un número de teléfono válido.`, e.target.parentElement);
        objForm[e.target.id] = '';
        comprobarCorreo();
        return;
    }
    if (e.target.id === 'email' && !validarEmail(e.target.value)) {
        mostrarAlerta(`La dirección ${e.target.value} no es un email válido.`, e.target.parentElement);
        objForm[e.target.id] = '';
        comprobarCorreo();
        return;
    }

    removerAlerta(e.target.parentElement);

    objForm[e.target.id] = e.target.value.trim().toLowerCase();

    comprobarCorreo();
}

function mostrarAlerta(msj, ref) {

    removerAlerta(ref);
    const alerta = document.createElement('P');
    alerta.textContent = msj;
    alerta.classList.add('error');

    ref.appendChild(alerta);
}

function removerAlerta(ref) {
    const existe = ref.querySelector('.error');
    if (existe) {
        existe.remove();
    }
}

function validarTelefono(tel) {
    const regex = /^(\+57)?(60\d{7}|[3-9]\d{9})$/;
    return regex.test(tel);
}
function validarEmail(email) {
    const regex = /^[\p{L}\p{N}._%+-]+@[\p{L}\p{N}.-]+\.[\p{L}]{2,}$/u;
    return regex.test(email);
}

function comprobarCorreo() {
    if (Object.values(objForm).includes('')) {
        submit.classList.add('opacidad-50');
        submit.disabled = true;
        return;
    }
    submit.classList.remove('opacidad-50');
    submit.disabled = false;

}