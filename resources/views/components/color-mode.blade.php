<button id="dark-mode-toggle" class="btn btn-light rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background-color: #007bff;">
    <i id="dark-mode-icon" class="bi bi-brightness-high-fill text-white"></i>
</button>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const toggleButton = document.getElementById("dark-mode-toggle");
    const icon = document.getElementById("dark-mode-icon");
    const body = document.body;

    // Aplicar el modo guardado en localStorage
    if (localStorage.getItem("darkMode") === "enabled") {
        body.classList.add("dark-mode");
        icon.classList.replace("bi-brightness-high-fill", "bi-moon-fill");
    }

    toggleButton.addEventListener("click", function () {
        body.classList.toggle("dark-mode"); // Alterna la clase automáticamente

        if (body.classList.contains("dark-mode")) {
            localStorage.setItem("darkMode", "enabled");
            icon.classList.replace("bi-brightness-high-fill", "bi-moon-fill");
        } else {
            localStorage.setItem("darkMode", "disabled");
            icon.classList.replace("bi-moon-fill", "bi-brightness-high-fill");
        }
    });
});
</script>
