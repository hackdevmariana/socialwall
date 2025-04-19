export function showModal(tagText, addTag) {
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
            headers: { 'Content-Type': 'application/json' },
        }).then(() => {
            addTag(tagText);
            modal.classList.remove('show');
        });
    };

    rejectBtn.onclick = () => {
        modal.classList.remove('show');
    };
}
