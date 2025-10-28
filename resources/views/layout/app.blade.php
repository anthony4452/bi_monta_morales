<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>University</title>

    <!-- Favicon -->
    <link href="{{ asset('photo/assets/img/icon.png') }}" rel="icon">
    <link href="{{ asset('photo/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Inter:wght@300;600&display=swap" rel="stylesheet">

    <!-- SweetAlert2 -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- DataTables -->
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css" rel="stylesheet">

    <!-- File Input -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-fileinput@5.5.5/css/fileinput.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.5.0/js/locales/es.min.js"></script>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="{{ asset('photo/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">

    <!-- AOS, Swiper, Glightbox -->
    <link href="{{ asset('photo/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('photo/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('photo/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS -->
    <link href="{{ asset('photo/assets/css/main.css') }}" rel="stylesheet">

    @stack('styles')
</head>

<body class="index-page">
    <!-- Header -->
    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid d-flex justify-content-between align-items-center">

            <a href="{{ url('/') }}" class="logo d-flex align-items-center me-auto me-xl-0">
                <i class="fa fa-camera"></i>
                <h1 class="sitename">Sistema de Puntos de Interés</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ url('/') }}" class="active">Inicio</a></li>
                    <li class="dropdown">
                        <a href="#"><span>Opciones</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="#">Ver Puntos</a></li>
                            <li><a href="#">Crear Punto</a></li>
                            <li><a href="#">Mapa Globla</a></li>
                        </ul>
                    </li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <div class="header-social-links">
                <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>

        </div>
    </header>

    <!-- Main -->
    <main class="main container py-4">
        @yield('contenido')
    </main>

    <!-- Footer -->
    <footer id="footer" class="footer">
        <div class="container text-center">
            <p>&copy; <strong class="sitename">SIG</strong> 2025</p>
            <p>Hecho por <a href="https://bootstrapmade.com/">Anthony</a> & <a href="https://themewagon.com">Diego</a></p>
        </div>
    </footer>

    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>
    <div id="preloader"><div class="line"></div></div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

    <!-- FileInput -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.5.4/js/fileinput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.5.0/js/locales/es.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>

    <!-- Plugins -->
    <script src="{{ asset('photo/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('photo/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('photo/assets/js/main.js') }}"></script>

    <!-- Google Maps (Define initMap para evitar error) -->

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsH8p2_RvwjklyfxceCy53hpbNG_6wzCs&libraries=places&callback=initMap" async defer></script>

    <!-- Validación -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>

    <!-- Estilo errores -->
    <style>
        .error {
            color: red;
            font-weight: bold;
        }
        .form-control.error {
            border: 1px solid red;
        }
    </style>

    <!-- SweetAlert mensaje éxito -->
    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: '¡Éxito!',
                text: '{{ session("success") }}',
                timer: 3000,
                timerProgressBar: true,
                showConfirmButton: false
            });
        </script>
    @endif

    @stack('scripts')
</body>
</html>
