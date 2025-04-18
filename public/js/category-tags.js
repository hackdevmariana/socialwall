document.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('post-categories-tags');
    const tagList = document.getElementById('tag-list');
    const suggestionsContainer = document.getElementById('suggestions-container');
    let tags = [];

    // Capturar etiquetas al presionar Enter o coma
    input.addEventListener('keydown', function (event) {
        if (event.key === 'Enter' || event.key === ',') {
            event.preventDefault();
            let tagText = input.value.trim().replace(',', '');

            if (tagText && !tags.includes(tagText)) {
                checkIfTagExists(tagText); // Verificar si la etiqueta ya existe antes de añadirla
                input.value = ''; // Limpiar el input después de añadir la etiqueta
            }
        }
    });

    // Función para verificar si la etiqueta ya existe en el sistema
    function checkIfTagExists(tagText) {
        fetch(`/api/suggestions?query=${tagText}`)
            .then(response => response.json())
            .then(existingTags => {
                if (!existingTags.includes(tagText)) {
                    showModal(tagText); // Mostrar el modal de confirmación si la etiqueta no existe
                } else {
                    addTag(tagText); // Si la etiqueta existe, añadirla directamente
                }
            });
    }

    // Mostrar el modal de confirmación para etiquetas nuevas
    function showModal(tagText) {
        const modal = document.getElementById('custom-modal');
        const modalText = document.getElementById('modal-text');
        const acceptBtn = document.getElementById('accept-btn');
        const rejectBtn = document.getElementById('reject-btn');

        modalText.textContent = `La etiqueta "${tagText}" no existe, ¿quieres crearla?`;
        modal.classList.add('show');

        acceptBtn.onclick = () => {
            fetch('/api/add-suggestion', {
                method: 'POST',
                body: JSON.stringify({ name: tagText }),
                headers: { 'Content-Type': 'application/json' }
            }).then(() => {
                addTag(tagText); // Agregar la etiqueta después de la confirmación
                modal.classList.remove('show');
            });
        };

        rejectBtn.onclick = () => {
            modal.classList.remove('show');
        };
    }

    // Agregar etiquetas visualmente en la lista
    function addTag(tagText) {
        tags.push(tagText);
        updateTagList();
    }

    // Actualizar el listado de etiquetas
    function updateTagList() {
        tagList.innerHTML = '';
        tags.forEach(tag => {
            let tagDiv = document.createElement('div');
            tagDiv.classList.add('tag');
            tagDiv.innerHTML = `${tag} <span onclick="removeTag('${tag}')">&times;</span>`;
            tagList.appendChild(tagDiv);
        });
    }

    // Eliminar etiquetas seleccionadas
    window.removeTag = function (tagName) {
        tags = tags.filter(tag => tag !== tagName);
        updateTagList();
    };
});
