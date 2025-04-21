document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
    const hiddenDateInput = document.getElementById('scheduled-date-hidden');

    if (form && hiddenDateInput) {
        form.addEventListener('submit', function () {
            const selectedDate = document.getElementById('publish-date').value;
            hiddenDateInput.value = selectedDate;

            console.log('Fecha programada antes de enviar:', selectedDate); // Verificar en consola
        });
    } else {
        console.error(
            'El formulario o el campo oculto de fecha no se encontraron en el DOM.',
        );
    }
});
