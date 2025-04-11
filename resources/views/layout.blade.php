<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layout con Bootstrap</title>
    
    <link href="/css/custom-values.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .navbar-custom { background-color: var(--navbar-bg); color: var(--text-color); }
        .left-column { background-color: var(--left-bg); padding: 20px; color: var(--text-color); }
        .center-column { background-color: var(--center-bg); padding: 20px; color: var(--text-color); }
        .right-column { background-color: var(--right-bg); padding: 20px; color: var(--text-color); }
    </style>
    
    @vite(['resources/js/app.ts'])

</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container d-flex justify-content-between">
            <div class="left">
                <a class="navbar-brand text-white" href="#">Inicio</a>
            </div>
            <div class="middle d-flex flex-grow-1 justify-content-around">
                <a class="nav-link text-white" href="#">Sección 1</a>
                <a class="nav-link text-white" href="#">Sección 2</a>
                <a class="nav-link text-white" href="#">Sección 3</a>
            </div>
            <div class="right">
                <x-color-mode />
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row g-3"> <!-- Agregamos un pequeño espacio entre columnas -->
            <!-- Columna Izquierda -->
            <div class="col-lg-3 d-none d-lg-block left-column">
                <p>Contenido de la columna izquierda</p>
            </div>
    
            <!-- Columna Central (Siempre visible) -->
            <div class="col-lg-6 col-12 center-column">
                <p>Contenido principal</p>
            </div>
    
            <!-- Columna Derecha -->
            <div class="col-lg-3 d-none d-lg-block right-column">
                <p>Contenido de la columna derecha</p>
            </div>
        </div>
    </div>
    
    

</body>
</html>
