<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layout base</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @vite(['resources/js/app.ts'])
    <link href="/css/custom-values.css" rel="stylesheet">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom shadow-sm">
        <div class="container d-flex justify-content-between">
            <div class="left">
                <a class="navbar-brand text-white" href="#">Inicio</a>
            </div>
            <div class="middle d-flex flex-grow-1 justify-content-around">
                <a class="nav-link" href="#">Sección 1</a>
                <a class="nav-link" href="#">Sección 2</a>
                <a class="nav-link" href="#">Sección 3</a>
            </div>
            <div class="right">
                <x-color-mode />
            </div>
        </div>
    </nav>

    <div class="container-fluid mt-4">
        <div class="row g-3">
            <!-- Columna Izquierda -->
            <div class="col-lg-3 d-none d-lg-block left-column border-end">
                <p>Contenido de la columna izquierda</p>
            </div>
    
            <!-- Columna Central -->
            <div class="col-lg-6 col-12 center-column">
                <p>Contenido principal</p>
            </div>
    
            <!-- Columna Derecha -->
            <div class="col-lg-3 d-none d-lg-block right-column border-start">
                <p>Contenido de la columna derecha</p>
            </div>
        </div>
    </div>

</body>
</html>
