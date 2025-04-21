document.addEventListener('DOMContentLoaded', function () {
    const scheduleBtn = document.getElementById('schedule-btn');
    const dateModal = document.getElementById('date-modal');
    const dateInput = document.getElementById('publish-date');
    const confirmDateBtn = document.getElementById('confirm-date-btn');
    const closeModalBtn = document.getElementById('close-modal-btn');
    const scheduledDateContainer = document.getElementById(
        'scheduled-date-container',
    );
    const scheduledDateText = document.getElementById('scheduled-date-text');
    const hiddenDateInput = document.getElementById('scheduled-date-hidden'); // Añadimos referencia al input oculto

    // Inicializar Flatpickr dentro del modal
    flatpickr(dateInput, {
        enableTime: true,
        dateFormat: 'Y-m-d H:i',
        minDate: 'today',
    });

    // Mostrar el modal al hacer clic en "Programar publicación"
    scheduleBtn.addEventListener('click', function () {
        dateModal.classList.add('show');
    });

    // Cerrar modal al hacer clic en "Cancelar"
    closeModalBtn.addEventListener('click', function () {
        dateModal.classList.remove('show');
    });

    // Confirmar fecha y mostrar en el formulario
    confirmDateBtn.addEventListener('click', function () {
        const selectedDate = dateInput.value;
        if (selectedDate) {
            scheduledDateText.textContent = `📅 Publicación programada para: ${selectedDate}`;
            scheduledDateContainer.style.display = 'block'; // Mostrar contenedor
            hiddenDateInput.value = selectedDate; // Guardar la fecha en el campo oculto
        }
        dateModal.classList.remove('show');
    });
});
