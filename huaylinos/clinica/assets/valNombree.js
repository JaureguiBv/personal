function validarNombre() {
    const nombreInput = document.getElementById("nom");
    const nombre = nombreInput.value.trim();

    // Expresión regular para validar el nombre
    const regexNombre = /^[a-zA-ZÀ-ÿñÑ'’\-\s]+$/;

    // Validar si está vacío
    if (nombre === "") {
        mostrarMensajeError("El nombre no puede estar vacío.");
        limpiarCampo(nombreInput);
        return false;
    }

    // Validar formato
    if (!regexNombre.test(nombre)) {
        mostrarMensajeError("Nombre inválido. Solo se permiten letras, espacios, apóstrofes y guiones.");
        limpiarCampo(nombreInput);
        return false;
    }

    // Validar longitud
    if (nombre.length < 3 || nombre.length > 50) {
        mostrarMensajeError("El nombre debe tener entre 3 y 50 caracteres.");
        limpiarCampo(nombreInput);
        return false;
    }

    // Capitalizar la primera letra de cada palabra
    const nombreCapitalizado = nombre.replace(/\b\w+/g, palabra =>
        palabra.charAt(0).toUpperCase() + palabra.slice(1).toLowerCase()
    );

    // Establecer el valor capitalizado
    nombreInput.value = nombreCapitalizado;
    limpiarError(nombreInput);
    return true;
}

// Mostrar mensaje de error
function mostrarMensajeError(mensaje) {
    alert(mensaje); // Muestra el mensaje de error
}

// Limpiar el campo en caso de error
function limpiarCampo(input) {
    input.value = ''; // Limpia el contenido del input
    marcarError(input); // Aplica estilo visual de error
}

// Marcar error visualmente
function marcarError(input) {
    input.classList.add("error");
    input.style.border = "2px solid red";
}

// Limpiar errores visuales
function limpiarError(input) {
    input.classList.remove("error");
    input.style.border = "";
}
