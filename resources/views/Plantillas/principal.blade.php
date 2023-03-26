<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desarrollo Web</title>
    <!--Ejemplo de inclusion de hoja de estilos + css-->
    <!--@vite(['resources/css/app.css', 'resources/js/app.js'])-->
    <!--Incluyendo los estilos en css-->
    @vite(['resources/css/app.css'])
    <!--Contenido de Material Design Bootstrap-->
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />
    <link rel="icon" href="{{ asset('img/icon.PNG')}}"/>
</head>
<body>
    <!--Barra de navegación-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a id="1" class="navbar-brand" href="/principal">Desarrollo Web</a>
            <!--Toggle Button Responsive-->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/articulos">Búsquedas Simples</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/zapatos">Búsquedas Avanzadas</a>
                    </li>
                    <!--Dropdown-->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">Códigos de Error</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
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
        <div class="text-center p-3 bg-primary" >
            <a class="text-dark" href="/">David Domínguez Reyes - 8° "A" - UTHH - 2023</a>
        </div>
    </footer>

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
</body>
</html>
