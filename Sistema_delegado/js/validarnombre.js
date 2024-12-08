function validarLetras() {
    let nombre = document.getElementById('nombre');
    const nombreValue = nombre.value.trim(); // Eliminar espacios en los extremos
    const errorMessage = document.getElementById('nombreError');
    const apellido = document.getElementById('apellido');

    const error = validarNombre(nombreValue);
    
    if (error) {
        errorMessage.textContent = error; // Mostrar el mensaje de error
        errorMessage.style.display = 'block'; // Mostrar el mensaje
        nombre.value = '';
        nombre.focus();
        // Aquí puedes optar por no limpiar el campo, ya que se validará en tiempo real
    } else {
        errorMessage.textContent = ''; // Limpiar mensaje de error
        errorMessage.style.display = 'none'; // Ocultar el mensaje
        apellido.focus();
    }
}

function validarNombre(nom) {
    const excluNumero = /^(?!.*\d).+$/;
    const excluCaracteresEspeciales = /^[A-Za-zñÑáéíóúÁÉÍÓÚ\s]+$/;

    if (nom === '') {
        return "El nombre no puede estar vacío"; // Mensaje para nombre vacío
    }

    if (!excluNumero.test(nom)) {
        return "Ingrese un nombre válido (sin números)"; // Mensaje de error si hay números
    }

    if (!excluCaracteresEspeciales.test(nom)) {
        return "Ingrese un nombre válido (sin caracteres especiales)"; // Mensaje de error si hay caracteres especiales
    }

    return null; // No hay error
}