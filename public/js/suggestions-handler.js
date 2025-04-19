export async function fetchSuggestions(query = '') {
    const response = await fetch(`/api/suggestions?query=${query}`);
    return response.json();
}

export function showSuggestions(
    categories,
    tags,
    suggestionsContainer,
    selectCategory,
    addTag,
) {
    suggestionsContainer.innerHTML = '';
    suggestionsContainer.style.display = 'block';

    categories.forEach((category) => {
        const div = document.createElement('div');
        div.classList.add('suggestion-item', 'category');
        div.textContent = category;
        div.addEventListener('mousedown', (event) => {
            // Usamos 'mousedown' para mejor respuesta en clic
            event.preventDefault();
            selectCategory(category);
            suggestionsContainer.style.display = 'none';
        });
        suggestionsContainer.appendChild(div);
    });

    tags.forEach((tag) => {
        const div = document.createElement('div');
        div.classList.add('suggestion-item', 'tag');
        div.textContent = tag;
        div.addEventListener('mousedown', (event) => {
            // Mejor respuesta en clic
            event.preventDefault();
            addTag(tag);
            suggestionsContainer.style.display = 'none';
        });
        suggestionsContainer.appendChild(div);
    });
}
