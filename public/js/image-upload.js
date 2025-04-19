const dropZone = document.querySelector('.drop-zone');
const fileInput = document.getElementById('post-images');
const previewContainer = document.getElementById('image-preview-container');
let imageFiles = new Set(); // Usamos un Set para evitar duplicados

dropZone.addEventListener('click', () => fileInput.click());

dropZone.addEventListener('dragover', (e) => {
    e.preventDefault();
    dropZone.style.backgroundColor = 'var(--body-bg)';
});

dropZone.addEventListener('drop', (e) => {
    e.preventDefault();
    const dt = new DataTransfer();

    Array.from(fileInput.files).forEach((file) => dt.items.add(file)); // Mantener archivos actuales
    Array.from(e.dataTransfer.files).forEach((file) => dt.items.add(file)); // Agregar nuevos archivos

    fileInput.files = dt.files; // Actualizar el input de archivos
    previewImages();
});

fileInput.addEventListener('change', () => {
    const dt = new DataTransfer();

    Array.from(fileInput.files).forEach((file) => dt.items.add(file)); // Mantener archivos actuales
    fileInput.files = dt.files; // Actualizar

    previewImages();
});

function previewImages() {
    previewContainer.innerHTML = ''; // Limpiar visualización pero NO borrar archivos existentes

    Array.from(fileInput.files).forEach((file) => {
        const reader = new FileReader();

        reader.onload = function (e) {
            const imageWrapper = document.createElement('div');
            imageWrapper.classList.add('image-wrapper');

            const img = document.createElement('img');
            img.src = e.target.result;
            img.style.width = '100px';
            img.style.marginRight = '10px';

            const deleteBtn = document.createElement('span');
            deleteBtn.textContent = '×';
            deleteBtn.classList.add('delete-image');
            deleteBtn.addEventListener('click', () => removeImage(file));

            imageWrapper.appendChild(img);
            imageWrapper.appendChild(deleteBtn);
            previewContainer.appendChild(imageWrapper);
        };

        reader.readAsDataURL(file);
    });
}

function removeImage(fileToRemove) {
    const dt = new DataTransfer();

    Array.from(fileInput.files).forEach((file) => {
        if (file !== fileToRemove) {
            dt.items.add(file); // Mantener archivos que NO fueron eliminados
        }
    });

    fileInput.files = dt.files; // Actualizar input de archivos
    previewImages(); // Volver a renderizar sin la imagen eliminada
}
