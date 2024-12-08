function validarApellido() {
    const apellido = document.getElementById('apellido');
    const apellidoValue = apellido.value.trim();
    const messageError = document.getElementById('apellidoError');
    const candidato = document.getElementById('candidato');

    const error = validarApe(apellidoValue);

    if (error) {
        messageError.textContent = error; // Mostrar el mensaje de error
        messageError.style.display = 'block'; // Mostrar el mensaje
        apellido.value = '';
        apellido.focus();
    } else {
        messageError.textContent = ''; // Limpiar mensaje de error
        messageError.style.display = 'none'; // Ocultar el mensaje
        candidato.focus();
    }
}

function validarApe(ape) {
    // Validar que no contenga números
    const excluNumero = /^(?!.*\d).+$/;
    // Validar que solo contenga letras, espacios, tildes y ñ
    const excluCaracteresEspeciales = /^[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+$/;

    if (ape === '') {
        return "El apellido no puede estar vacío"; // Mensaje para apellido vacío
    }
    if (!excluNumero.test(ape)) {
        return "Ingrese un apellido válido (sin números)"; // Mensaje de error si hay números
    }
    if (!excluCaracteresEspeciales.test(ape)) {
        return "Ingrese un apellido válido (sin caracteres especiales)"; // Mensaje de error si hay caracteres especiales
    }
    
    return null; // No hay error
}
