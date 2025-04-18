document.addEventListener('DOMContentLoaded', function () {
    const inputs = document.querySelectorAll('.input-field');

    inputs.forEach(input => {
        input.addEventListener('keyup', function () {
            if (this.value.trim()) {
                this.classList.add('has-text');
            } else {
                this.classList.remove('has-text');
            }
        });
    });
});
