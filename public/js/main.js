document.addEventListener('DOMContentLoaded', function () {
    const writePostBtn = document.getElementById('write-post-btn');
    const editorContainer = document.getElementById('post-editor-container');

    writePostBtn.addEventListener('click', function () {
        editorContainer.classList.toggle('show');
        writePostBtn.textContent = editorContainer.classList.contains('show')
            ? 'Cerrar editor'
            : 'Escribir post';
    });
    document.querySelector('form').addEventListener('submit', function () {
        const editorContent = tinymce.get('post-editor').getContent();
        document.getElementById('post-content').value = editorContent
            ? editorContent
            : ' ';
        console.log('Contenido antes de enviar:', editorContent); // Verificar en consola
    });
    // Esperar a que TinyMCE esté completamente cargado antes de capturar el contenido
    tinymce.init({
        selector: '#post-editor',
        license_key: 'gpl', // Evita el modo evaluación
        plugins: 'link image code', // NO incluir 'print'
        toolbar:
            'undo redo | bold italic | alignleft aligncenter alignright | code',
        setup: function (editor) {
            editor.on('init', function () {
                console.log('TinyMCE inicializado correctamente.');
                document.getElementById('post-content').value =
                    editor.getContent();
            });

            editor.on('change', function () {
                document.getElementById('post-content').value =
                    editor.getContent();
            });
        },
    });
});
