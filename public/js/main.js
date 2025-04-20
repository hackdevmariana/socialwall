document.addEventListener('DOMContentLoaded', function () {
    const writePostBtn = document.getElementById('write-post-btn');
    const editorContainer = document.getElementById('post-editor-container');

    writePostBtn.addEventListener('click', function () {
        editorContainer.classList.toggle('show');
        writePostBtn.textContent = editorContainer.classList.contains('show')
            ? 'Cerrar editor'
            : 'Escribir post';
    });

    // Esperar a que TinyMCE esté completamente cargado antes de capturar el contenido
    tinymce.init({
        selector: '#post-editor',
        setup: function (editor) {
            editor.on('init', function () {
                document
                    .querySelector('form')
                    .addEventListener('submit', function () {
                        document.getElementById('post-content').value =
                            editor.getContent();
                    });
            });
        },
    });
});
