<div id="editor-container">
    <button id="write-post-btn" class="text-button mb-3">Escribir post</button>
    <div id="post-editor-container" class="transition">
        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="input-container">
                <input type="text" id="post-title" name="title" class="text-input input-field" required />
                <label for="post-title" class="input-label">Título del post</label>
            </div>

            <div class="input-container">
                <input type="url" id="social-link" name="social_link" class="text-input input-field" />
                <label for="social-link" class="input-label">Enlace opcional (Youtube, Twitter...)</label>
            </div>


            <x-tiny-mce-editor editor-id="post-editor" />
            <input type="hidden" id="post-content" name="content" value="" />


            <div class="input-container">
                <input type="text" id="post-categories-tags" name="categories_tags" class="text-input mb-3 mt-3" placeholder="Escribe una categoría o etiqueta..." />
                <div id="tag-list" class="tag-list"></div>
            </div>
            
            <div id="scheduled-date-container" class="scheduled-date">
                <p id="scheduled-date-text"></p>
            </div>

            <div id="suggestions-container" class="suggestions"></div>
            <div id="custom-modal" class="modal-container">
                <div class="modal-content">
                    <p id="modal-text"></p>
                    <div class="btn-container">
                        <button id="accept-btn" class="btn-accept">
                            <i class="bi bi-check-circle"></i> Aceptar
                        </button>
                        <button id="reject-btn" class="btn-reject">
                            <i class="bi bi-x-circle"></i> Rechazar
                        </button>
                    </div>
                </div>
            </div>



            <div class="mb-3">
                <div class="drop-zone">
                    <i class="bi bi-image"></i>
                    <p>Arrastra aquí tus imágenes o haz clic para seleccionarlas</p>
                    <input type="file" id="post-images" name="images[]" multiple class="hidden-input" onchange="previewImages()" />
                </div>
                <div id="image-preview-container"></div>
            </div>

            
            <div class="flex-container button-group">
                <button type="button" id="schedule-btn" class="text-button quarter-width" data-tooltip="Programar publicación">
                    <i class="bi bi-clock"></i>
                </button>
                <button type="submit" name="status" value="published" class="text-button quarter-width" data-tooltip="Publicar entrada">
                    <i class="bi bi-send"></i>
                </button>
                <button type="submit" name="status" value="draft" class="text-button quarter-width" data-tooltip="Guardar borrador">
                    <i class="bi bi-save"></i>
                </button>
            </div>
            <div id="tooltip-container" class="tooltip-container"></div>


            <!-- Modal con el selector de fecha y hora -->
            <div id="date-modal" class="modal-container">
                <div class="modal-content">
                    <h3>Selecciona fecha y hora</h3>
                    <input type="text" id="publish-date" class="text-input">
                    <div class="btn-container">
                        <button id="confirm-date-btn" class="btn-accept">
                            <i class="bi bi-check-circle"></i> Confirmar
                        </button>
                        <button id="close-modal-btn" class="btn-reject">
                            <i class="bi bi-x-circle"></i> Cancelar
                        </button>
                    </div>
                </div>
            </div>


        </form>
    </div>
</div>
