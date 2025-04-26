import { showModal } from './modal-handler.js';
import { fetchSuggestions, showSuggestions } from './suggestions-handler.js';

document.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('post-categories-tags');
    const tagList = document.getElementById('tag-list');
    const suggestionsContainer = document.getElementById(
        'suggestions-container',
    );
    const postEditor = document.getElementById('post-editor-container');
    const latestPosts = document.querySelector('.latest-posts');

    let tags = [];
    let selectedCategories = [];

    document
        .getElementById('write-post-btn')
        .addEventListener('click', function () {
            postEditor.style.height = 'auto'; // Asegura que el contenido fluya naturalmente
            latestPosts.style.marginTop = '40px'; // Desplaza hacia abajo los posts recientes
        });

    input.addEventListener('input', async function () {
        const query = input.value.trim();

        if (query.length >= 2) {
            // Se activan sugerencias a partir de 2 caracteres
            const data = await fetchSuggestions(query);
            showSuggestions(data.tags, suggestionsContainer, addTag); // Solo usamos `tags`
        } else {
            suggestionsContainer.style.display = 'none'; // Ocultar si no hay suficiente texto
        }
    });

    function selectCategory(category) {
        if (!selectedCategories.includes(category)) {
            selectedCategories.push(category);
        }
        input.value = '';
        updateSelectionList();
    }

    function updateCategoryList() {
        tagList.innerHTML = '';
        selectedCategories.forEach((category) => {
            let categoryDiv = document.createElement('div');
            categoryDiv.classList.add('tag', 'category-selected');
            categoryDiv.innerHTML = `${category} <span onclick="removeCategory('${category}')">&times;</span>`;
            tagList.appendChild(categoryDiv);
        });
    }

    window.removeCategory = function (category) {
        selectedCategories = selectedCategories.filter(
            (cat) => cat !== category,
        );
        updateCategoryList();
    };

    function addTag(tagText) {
        if (!tags.includes(tagText)) {
            tags.push(tagText);
        }
        input.value = '';
        updateSelectionList();
    }

    function updateTagList() {
        tagList.innerHTML = '';
        tags.forEach((tag) => {
            let tagDiv = document.createElement('div');
            tagDiv.classList.add('tag');
            tagDiv.innerHTML = `${tag} <span onclick="removeTag('${tag}')">&times;</span>`;
            tagList.appendChild(tagDiv);
        });
    }

    window.removeTag = function (tagName) {
        tags = tags.filter((tag) => tag !== tagName);
        updateTagList();
    };

    function checkIfTagExists(tagText) {
        fetch(`/api/suggestions?query=${tagText}`)
            .then((response) => response.json())
            .then((data) => {
                const existingTags = data.tags; // Solo etiquetas
                const existingCategories = data.categories; // Solo categorías

                if (
                    !existingTags.includes(tagText) &&
                    !existingCategories.includes(tagText)
                ) {
                    showModal(tagText, addTag); // Llamamos correctamente al modal
                } else {
                    addTag(tagText);
                }
            });
    }

    function updateSelectionList() {
        tagList.innerHTML = '';

        // Mostrar etiquetas
        tags.forEach((tag) => {
            let tagDiv = document.createElement('div');
            tagDiv.classList.add('tag');
            tagDiv.innerHTML = `${tag} <span onclick="removeTag('${tag}')">&times;</span>`;
            tagList.appendChild(tagDiv);
        });
    }
});

window.addEventListener('load', function () {
    const form = document.querySelector('form');
    const hiddenInput = document.getElementById('categories-tags-hidden');

    if (form && hiddenInput) {
        form.addEventListener('submit', function () {
            const tags = [
                ...new Set(
                    [...document.querySelectorAll('.tag')].map((tag) =>
                        tag.textContent.replace(' ×', '').trim(),
                    ),
                ),
            ];

            hiddenInput.value = tags;
            console.log('Etiquetas antes de enviar:', tags); // Verificar en consola
        });
    } else {
        console.error(
            'El formulario o el input oculto no se encontraron en el DOM.',
        );
    }
});
