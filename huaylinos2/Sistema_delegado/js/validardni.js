function validarDNI() {
    const num = document.getElementById('dni');
    const dniValue = num.value.trim();
    const errorMessage = document.getElementById('mensajeError');
    const nombre = document.getElementById('nombre');

    const error = validarDNIInput(dniValue);

    if (error) {
        errorMessage.textContent = error; // Mostrar el mensaje de error
        errorMessage.style.display = 'block'; // Mostrar el mensaje
        num.value = '';
    } else {
        errorMessage.textContent = ''; // Limpiar mensaje de error
        errorMessage.style.display = 'none'; // Ocultar el mensaje
        nombre.focus();
    }
}

function validarDNIInput(dni) {
    if (dni.length === 0) {
        return "El campo no puede estar vacío.";
    }
    if (dni.length !== 8) {
        return "El DNI debe tener exactamente 8 dígitos.";
    }
    if (!/^\d+$/.test(dni)) {
        return "El DNI solo puede contener números.";
    }
    return null; // Sin errores
}