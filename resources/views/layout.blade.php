<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SocialWall</title>

    <!-- Estilos -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>

    <script type="module" src="{{ asset('js/main.js') }}" defer></script>
    <script type="module" src="{{ asset('js/image-upload.js') }}" defer></script>
    <script type="module" src="{{ asset('js/category-tags.js') }}" defer></script>
    <script type="module" src="{{ asset('js/modal-handler.js') }}" defer></script>
    <script type="module" src="{{ asset('js/suggestions-handler.js') }}" defer></script>
    <script type="module" src="{{ asset('js/tag-selection.js') }}" defer></script>
    <script type="module" src="{{ asset('js/placeholder-shown.js') }}" defer></script>
    <script type="module" src="{{ asset('js/tooltip-button.js') }}" defer></script>
    <script type="module" src="{{ asset('js/show-calendar.js') }}" defer></script>
    <script type="module" src="{{ asset('js/scheduled-date.js') }}" defer></script>

    


    @vite(['resources/js/app.ts'])
</head>

<body>

    @include('partials.navbar')

    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-lg-3 d-none d-lg-block left-column border-end">
                @include('partials.sidebar-left')
            </div>
            <div class="col-12 col-lg-6 center-column">
                @auth
                    @include('partials.post-editor')
                @endauth

                @include('partials.latest-posts', ['posts' => $posts])


            </div>
            <div class="col-lg-3 d-none d-lg-block left-column border-start">
                @include('partials.sidebar-right')
            </div>
        </div>
    </div>
</body>

</html>
