document.addEventListener('DOMContentLoaded', function () {
    const scheduleBtn = document.getElementById('schedule-btn');
    const dateModal = document.getElementById('date-modal');
    const dateInput = document.getElementById('publish-date');
    const confirmDateBtn = document.getElementById('confirm-date-btn');
    const closeModalBtn = document.getElementById('close-modal-btn');

    // Inicializar Flatpickr dentro del modal
    flatpickr(dateInput, {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        minDate: "today"
    });

    // Mostrar el modal al hacer clic en "Programar publicación"
    scheduleBtn.addEventListener('click', function () {
        dateModal.classList.add('show');
    });

    // Cerrar modal al hacer clic en "Cancelar"
    closeModalBtn.addEventListener('click', function () {
        dateModal.classList.remove('show');
    });

    // Confirmar fecha y ocultar modal
    confirmDateBtn.addEventListener('click', function () {
        alert(`Publicación programada para: ${dateInput.value}`);
        dateModal.classList.remove('show');
    });
});

