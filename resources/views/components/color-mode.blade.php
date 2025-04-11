<button id="dark-mode-toggle" class="btn btn-light">Modo Oscuro</button>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const toggleButton = document.getElementById("dark-mode-toggle");
    const body = document.body;

    // Aplicar el modo guardado en localStorage
    if (localStorage.getItem("darkMode") === "enabled") {
        body.classList.add("dark-mode");
        toggleButton.innerText = "Modo Claro";
    }

    toggleButton.addEventListener("click", function () {
        body.classList.toggle("dark-mode"); // Alterna la clase automáticamente

        if (body.classList.contains("dark-mode")) {
            localStorage.setItem("darkMode", "enabled");
            toggleButton.innerText = "Modo Claro";
        } else {
            localStorage.setItem("darkMode", "disabled");
            toggleButton.innerText = "Modo Oscuro";
        }
    });
});

</script>