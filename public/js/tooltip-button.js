document.addEventListener('DOMContentLoaded', function () {
    const buttons = document.querySelectorAll('.button-group button');
    const tooltipContainer = document.getElementById('tooltip-container');

    buttons.forEach(button => {
        button.addEventListener('mouseover', function () {
            const text = button.getAttribute('data-tooltip'); // Obtiene el texto correcto
            tooltipContainer.textContent = text;
            tooltipContainer.classList.add('show');
        });

        button.addEventListener('mouseout', function () {
            tooltipContainer.classList.remove('show');
        });
    });
});
