function validarGmail() {
    const emailInput = document.getElementById('email');
    let emailValue = emailInput.value.trim();
    const errorMessage = document.getElementById('emailError');
    const pass = document.getElementById('password');

    // Clear previous error messages
    errorMessage.textContent = '';
    errorMessage.style.display = 'none';

    // Check if email contains an "@" and correct domain to "@gmail.com" if necessary
    if (emailValue.includes('@')) {
        if (!emailValue.endsWith('@institutocajas.info')) {
            const [localPart] = emailValue.split('@'); // Get everything before "@"
            emailValue = `${localPart}@institutocajas.info`; // Set domain to "gmail.com"
            emailInput.value = emailValue; // Update the input field
            errorMessage.textContent = 'Los correos electrónicos deben tener @institutocajas.info obligatoriamente';
            errorMessage.style.display = 'block';
            errorMessage.style.color = 'green'; // Set the color to green
            pass.focus();   
        }
    }

    

    // Additional format validation
    const error = validarFormatoGmail(emailValue);
    if (error) {
        errorMessage.textContent = error; // Set format error message
        errorMessage.style.display = 'block';
        errorMessage.style.color = 'red'; // Set color to red for format error
    }else{
        errorMessage.textContent = ''; // Set format error message
        errorMessage.style.display = 'none';
    }
}

// Función para validar el formato específico de Gmail
function validarFormatoGmail(gmail) {
    const gmailRegex = /^[a-zA-Z0-9._%+-]+@institutocajas\.info$/;

    if (gmail === '') {
        return 'El campo de correo electrónico no puede estar vacío.';
    }
    if (!gmailRegex.test(gmail)) {
        return 'Por favor, ingresa un correo electrónico de Gmail válido (ejemplo@gmail.com).';
    }
    if (emailValue.length > 30) {
        return 'Ingrese un correo menor a 30 caracteres';
    }
    return null; // Sin errores
}
