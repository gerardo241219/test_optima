const names = document.querySelector('#name');
const age = document.querySelector('#age');
const number = document.querySelector('#number');
const email = document.querySelector('#email');
const car = document.querySelector('#car');
const model = document.querySelector('#model');

const btn_register = document.querySelector('#register');
const btn_edit = document.querySelector('#edit');
const btn_delete = document.querySelectorAll('[id=btn_delete]');

$(document).ready(function () {
    $('#table').DataTable();
});

if (btn_delete) {
    btn_delete.forEach(element => {
        element.addEventListener('click', e => {
            e.preventDefault();

            $.ajax({
                url: 'http://localhost/test/server/delete.php',
                type: 'POST',
                data: {
                    'register': element.dataset.register
                }
            }).done(function (response) {
                Swal.fire({
                    icon: 'success',
                    title: response,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    confirmButtonText: "Continuar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                    }
                })
            })
        })
    });
}


if (btn_register) {

    document.addEventListener('DOMContentLoaded', () => {
        clean_inputs();
    })

    btn_register.addEventListener('click', e => {
        e.preventDefault();

        const v_name = validate_name(names.value);
        const v_age = validate_age(age.value);
        const v_number = validate_number(number.value);
        const v_email = validate_email(email.value);
        const v_car = validate_select(car.value);
        const v_model = validate_select(model.value);

        if (v_name, v_age, v_number, v_email, v_car, v_model) {

            $.ajax({
                url: 'http://localhost/test/server/insert.php',
                type: 'POST',
                data: {
                    'names': names.value,
                    'age': age.value,
                    'phone_number': number.value,
                    'email': email.value,
                    'model': model.value,
                }
            }).done(function (response) {
                Swal.fire({
                    icon: 'success',
                    title: response,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    confirmButtonText: "Continuar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href = "http://localhost/test/";
                    }
                })
            }).fail(function (response) {
                Swal.fire({
                    icon: 'error',
                    title: response,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    confirmButtonText: "Aceptar"
                })
            })

        }
    });
}

if (btn_edit) {
    btn_edit.addEventListener('click', e => {
        e.preventDefault();

        const v_name = validate_name(names.value);
        const v_age = validate_age(age.value);
        const v_number = validate_number(number.value);
        const v_email = validate_email(email.value);
        const v_car = validate_select(car.value);
        const v_model = validate_select(model.value);

        if (v_name, v_age, v_number, v_email, v_car, v_model) {
            if (btn_edit.dataset.register != "") {
                $.ajax({
                    url: 'http://localhost/test/server/update.php',
                    type: 'POST',
                    data: {
                        'names': names.value,
                        'age': age.value,
                        'phone_number': number.value,
                        'email': email.value,
                        'model': model.value,
                        'register': btn_edit.dataset.register
                    }
                }).done(function (response) {
                    let text = "";
                    let icon = "";

                    if (response == "error") {
                        text = "No has realizado ningun cambio";
                        icon = 'info';

                        Swal.fire({
                            icon: icon,
                            title: text,
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            confirmButtonText: "Continuar"
                        })
                    } else {
                        text = "Registro actualizado correctamente";
                        icon = 'success';

                        Swal.fire({
                            icon: icon,
                            title: text,
                            allowOutsideClick: false,
                            allowEscapeKey: false,
                            confirmButtonText: "Continuar"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.href = "http://localhost/test/";
                            }
                        })
                    }
                })
            }
        }

        return false;
    });
}

if (car) {
    car.addEventListener('change', e => {

        $.ajax({
            url: 'http://localhost/test/server/getModel.php',
            type: 'POST',
            data: {
                'car': e.target.value,
            },
            dataType: 'json'
        }).done(function (response) {

            if (response && Array.isArray(response)) {

                const model_option = model.options.length - 1;

                for (let index = model_option; index >= 0; index--) {
                    model.remove(index);
                }

                for (let index = 0; index < response.length; index++) {
                    const element = response[index];

                    let option = document.createElement("option");

                    if (element.id_model) {
                        option.setAttribute("value", element.id_model);
                    }
                    if (element.name_model) {
                        let optionText = document.createTextNode(element.name_model);
                        option.appendChild(optionText);
                    }

                    model.appendChild(option);
                }
            }

        })
    })
}






