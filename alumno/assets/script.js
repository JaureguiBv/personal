document.querySelectorAll('.delete').forEach(button => {
    button.addEventListener('click', function (event) {
        if (!confirm("¿Está seguro de que desea eliminar esta persona?")) {
            event.preventDefault();
        }
    });
});
