const dropZone = document.querySelector('.drop-zone');
const fileInput = document.getElementById('post-images');

dropZone.addEventListener('click', () => fileInput.click());

dropZone.addEventListener('dragover', (e) => {
    e.preventDefault();
    dropZone.style.backgroundColor = 'var(--body-bg)';
});

dropZone.addEventListener('drop', (e) => {
    e.preventDefault();
    fileInput.files = e.dataTransfer.files;
    previewImages();
});

function previewImages() {
    const previewContainer = document.getElementById('image-preview-container');
    const files = document.getElementById('post-images').files;

    previewContainer.innerHTML = ''; // Limpiar contenedor
    for (let i = 0; i < files.length; i++) {
        const file = files[i];
        const reader = new FileReader();

        reader.onload = function (e) {
            const img = document.createElement('img');
            img.src = e.target.result;
            img.style.width = '100px';
            img.style.marginRight = '10px';
            previewContainer.appendChild(img);
        };

        reader.readAsDataURL(file);
    }
}
