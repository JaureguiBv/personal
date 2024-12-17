const passwordInput = document.getElementById('password');
const togglePasswordButton = document.getElementById('togglePassword');

togglePasswordButton.addEventListener('click', () => {
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);
    togglePasswordButton.innerHTML = type === 'password' ? '<i class="bi bi-eye-fill"></i>' : '<i class="bi bi-eye-slash-fill"></i>';
});