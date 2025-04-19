export function enableMouseSelection(suggestionsContainer) {
    suggestionsContainer.addEventListener('mouseover', function (event) {
        if (event.target.classList.contains('suggestion-item')) {
            event.target.classList.add('highlight');
        }
    });

    suggestionsContainer.addEventListener('mouseout', function (event) {
        if (event.target.classList.contains('suggestion-item')) {
            event.target.classList.remove('highlight');
        }
    });

    suggestionsContainer.addEventListener('click', function (event) {
        if (event.target.classList.contains('suggestion-item')) {
            event.target.click();
        }
    });
}
