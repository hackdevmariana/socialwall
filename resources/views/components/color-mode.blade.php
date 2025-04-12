<button id="dark-mode-toggle" class="btn rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; background-color: #1a1a2e;">
    <i id="dark-mode-icon" class="bi bi-brightness-high-fill sun"></i>
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
        icon.classList.replace("sun", "text-white");
    } 

    toggleButton.addEventListener("click", function () {
        body.classList.toggle("dark-mode"); 
        if (body.classList.contains("dark-mode")) {
            localStorage.setItem("darkMode", "enabled");
            icon.classList.replace("bi-moon-fill", "bi-brightness-high-fill");
            icon.classList.replace("text-white", "sun");


        } else {
            localStorage.setItem("darkMode", "disabled");
            icon.classList.replace("bi-brightness-high-fill", "bi-moon-fill");
            icon.classList.replace("sun", "text-white");

        }
    });
});
</script>
