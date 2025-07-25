<div id="editor-container">
    <textarea id="{{ $editorId ?? 'post-editor' }}"></textarea>
</div>



<script src="{{ mix('tinymce/tinymce/tinymce.min.js') }}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        tinymce.init({
            selector: '#{{ $editorId ?? 'post-editor' }}',
            base_url: '/tinymce/tinymce', // Ruta de los recursos de TinyMCE
            skin: 'oxide', // Tema de TinyMCE
            plugins: 'advlist autolink lists link charmap print preview anchor',
            toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright | bullist numlist | link',
            height: 300,
            menubar: false,
        });
    });
</script>
