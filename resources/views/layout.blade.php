<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layout base</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @vite(['resources/js/app.ts'])
    

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-custom shadow-sm">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="left">
                <a href="{{ route('home') }}" class="logo-link">
                    @php
                        $logo = App\Models\Logo::first();
                    @endphp
            
                    @if ($logo)
                        <x-logo :logo="$logo" />
                    @endif
                </a>
            </div>
            
    
            <!-- Enlaces centrados -->
            <div class="middle d-flex flex-grow-1 justify-content-center gap-3">
                <a class="nav-link" href="#">Sección 1</a>
                <a class="nav-link" href="#">Sección 2</a>
                <a class="nav-link" href="#">Sección 3</a>
            </div>
    
            <!-- Icono de cambio de color a la derecha -->
            <div class="right">
                <x-user-status />
                <x-color-mode />
            </div>
        </div>
    </nav>
    

    <div class="container-fluid mt-4">
        <div class="row">
            <!-- Columna izquierda (oculta en pantallas pequeñas) -->
            <div class="col-lg-3 d-none d-lg-block left-column border-end">
                <p>Contenido de la columna izquierda</p>
            </div>
    
            <!-- Columna central (siempre visible) -->
            <div class="col-12 col-lg-6 center-column">
                <p>Contenido principal</p>
            </div>
    
            <!-- Columna derecha (oculta en pantallas pequeñas) -->
            <div class="col-lg-3 d-none d-lg-block right-column border-start">
                <p>Contenido de la columna derecha</p>
            </div>
        </div>
    </div>
    

</body>

</html>