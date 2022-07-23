// Funciones para validar los valores del formulario

function validate_name(text) {
    if(text.length == 0) {
        alert('Nombre es campo obligatorio');
        return;
    }

    if(!text.match(/^[a-zñ ,.'-]+$/i)) {
        alert('El nombre no puede llevar numeros');
        return;
    }

    return true;
}

function validate_age(number) {
    if(number.length == 0) {
        alert('La edad es obligatoria');
        return;
    }

    if(!number.match(/^[0-9]+$/i)) {
        alert('La edad no puede llevar letras');
        return;
    }

    return true;
}

function validate_number(number) {

    if(number.length == 0) {
        alert('El numero de telefono es obligatorio');
        return;
    }

    if(number.length < 10 || number.length > 10) {
        alert('El numero de telefono tiene que ser de 10 digitos');
        return;
    }

    if(!number.match(/^[0-9]+$/i)) {
        alert('El numero de telefono no puede llevar letras');
        return;
    }

    return true;
}


function validate_email(email) {
    if(email.length == 0) {
        alert('El correo es obligatorios');
        return;
    }

    if(!email.match(/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i)) {
        alert('Correo invalido');
        return;
    }

    return true;
}

function validate_select(select) {
    if(select == "") {
        alert('La marca y el modelo son obligatorios');
        return;
    }

    return true;
}

// Funcion para limpiar los campos de registro

function clean_inputs() {
    names.value = "";
    age.value = "";
    number.value = "";
    email.value = "";
    car.value = "";
    model.value = "";
}