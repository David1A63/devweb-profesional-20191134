<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Mercado</title>
    <!--Ejemplo de inclusion de hoja de estilos + css-->
    <!--@vite(['resources/css/app.css', 'resources/js/app.js'])-->
    <!--Incluyendo los estilos en css-->
    @vite(['resources/css/app.css'])
    <link rel="icon" href="{{ asset('img/icon.PNG')}}"/>
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
</head>
<body>
    <!--Barra de navegación-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary" >
        <div class="container-fluid">
            <a id="1" class="navbar-brand" href="/">Super Mercado</a>
            <!--Toggler Button Responsive-->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-white fw-bold" href="/articulos">Búsquedas Simples</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-white fw-bold" href="/zapatos">Búsquedas Avanzadas</a>
                    </li>
                    <!--Dropdown-->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Códigos de Error</a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="/error-400">Error 400</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/error-404">Error 404</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="/error-500">Error 500</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!--Contenido Principal-->
    @yield('contenidoPrincipal')

    <!--Pie de Página-->
    <footer class="bg-light text-center text-lg-start">
        <div class="text-center p-3 bg-primary text-black fw-bold" >
            David Domínguez Reyes - 8° "A" - UTHH - 2023
        </div>
    </footer>

    <!--Js Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
