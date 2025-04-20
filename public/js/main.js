document.addEventListener('DOMContentLoaded', function () {
    const writePostBtn = document.getElementById('write-post-btn');
    const editorContainer = document.getElementById('post-editor-container');

    writePostBtn.addEventListener('click', function () {
        editorContainer.classList.toggle('show');
        writePostBtn.textContent = editorContainer.classList.contains('show')
            ? 'Cerrar editor'
            : 'Escribir post';
    });
});

document.querySelector('form').addEventListener('submit', function () {
    const editorContent = tinymce.get('post-editor').getContent();
    document.getElementById('post-content').value = editorContent
        ? editorContent
        : ' ';
});
