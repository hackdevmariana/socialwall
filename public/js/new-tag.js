document.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('post-categories-tags');
    const modal = document.getElementById('custom-modal');
    const modalText = document.getElementById('modal-text');
    const acceptBtn = document.getElementById('accept-btn');
    const rejectBtn = document.getElementById('reject-btn');

    input.addEventListener('blur', function () {
        setTimeout(() => {
            const query = input.value.trim();
            fetch(`/api/suggestions?query=${query}`)
                .then(response => response.json())
                .then(existingTags => {
                    if (query && !existingTags.includes(query)) {
                        modalText.textContent = `La etiqueta "${query}" no existe, ¿quieres crearla?`;
                        modal.classList.add('show');

                        acceptBtn.onclick = () => {
                            fetch('/api/add-suggestion', {
                                method: 'POST',
                                body: JSON.stringify({ name: query }),
                                headers: { 'Content-Type': 'application/json' }
                            });
                            modal.classList.remove('show');
                        };

                        rejectBtn.onclick = () => {
                            modal.classList.remove('show');
                        };
                    }
                });
        }, 200);
    });
});
