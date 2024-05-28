const regexMail = /^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$/g;

document.addEventListener("DOMContentLoaded", () => {
    // Mostrar/Ocultar contraseña
    document.getElementById("btnMostrarOcultar").addEventListener("click", e => {
        if (e.target.innerText == "Ver") {
            e.target.innerText = "Ocultar";
            document.getElementById("txtPassword").type = 'text';
        } else {
            e.target.innerText = "Ver";
            document.getElementById("txtPassword").type = 'password';
        }
    });

    // Validar correo electrónico en cada tecla presionada
    document.getElementById("txtEmail").onkeyup = e => {
        if (e.code == "Tab") return;  // Ignorar la tecla Tab
        let txt = e.target;
        if (txt.value.trim().match(regexMail)) {  // Comprobar si el correo electrónico coincide con la expresión regular
            txt.setCustomValidity("");  // Borrar cualquier mensaje de validación personalizado
            txt.classList.add("valido");  // Añadir clase de estilo válido
            txt.classList.remove("novalido");  // Quitar clase de estilo no válido
        } else {
            txt.setCustomValidity("Campo no válido");  // Establecer mensaje de validación personalizado
            txt.classList.remove("valido");  // Quitar clase de estilo válido
            txt.classList.add("novalido");  // Añadir clase de estilo no válido
        }
    };

    // Validar longitud de la contraseña en cada tecla presionada
    document.getElementById("txtPassword").onkeyup = e => {
        revisarControl(e, 1, 50);  // Llamar a la función de revisión de control con los límites de longitud
    };

    // Validación final al hacer clic en el botón de enviar
    document.getElementById("btnAceptar").addEventListener("click", e => {
        let alert = e.target.parentElement.querySelector(".alert");
        if (alert) {
            alert.remove();  // Quitar cualquier mensaje de alerta anterior
        }

        e.target.form.classList.add("validado");

        let txtContrasenia = document.getElementById("txtPassword");
        let txtEmail = document.getElementById("txtEmail");
        txtContrasenia.setCustomValidity("");
        txtEmail.setCustomValidity("");

        // Validar longitud de la contraseña
        if (txtContrasenia.value.trim().length < 1 || txtContrasenia.value.trim().length > 50) {
            txtContrasenia.setCustomValidity("Campo no válido");
        }

        // Validar formato del correo electrónico
        if (!txtEmail.value.trim().match(regexMail)) {
            txtEmail.setCustomValidity("Campo no válido");
        }

        // Impedir el envío del formulario si no es válido
        if (!e.target.form.checkValidity()) {
            e.preventDefault();
        }
    });
});

// Función para validar longitud de un campo de entrada
function revisarControl(e, min, max) {
    if (e.code == "Tab") return;  // Ignorar la tecla Tab
    let txt = e.target;
    txt.setCustomValidity("");
    txt.classList.remove("valido");
    txt.classList.remove("novalido");
    if (txt.value.trim().length < min || txt.value.trim().length > max) {
        txt.setCustomValidity("Campo no válido");
        txt.classList.add("novalido");
        return false;
    } else {
        txt.classList.add("valido");
        return true;
    }
}