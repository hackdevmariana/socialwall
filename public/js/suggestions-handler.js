export async function fetchSuggestions(query = '') {
    console.log('Buscando sugerencias para:', query);
    const response = await fetch(`/api/tags?query=${query}`);
    const data = await response.json();
    console.log('Datos recibidos:', data); // Verificar en la consola
    return data;
}

export function showSuggestions(tags, suggestionsContainer, addTag) {
    suggestionsContainer.innerHTML = '';
    suggestionsContainer.style.display = 'block';

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
