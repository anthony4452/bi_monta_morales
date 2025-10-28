<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Sistema de Universidad UTC</title>

    <!-- Favicon -->
    <link href="{{ asset('photo/assets/img/icon.png') }}" rel="icon">
    <link href="{{ asset('photo/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

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

    <!-- Estilos personalizados para la universidad con tema negro -->
    <style>
        :root {
            --utc-primary: #1a1a1a;
            --utc-secondary: #2d2d2d;
            --utc-accent: #4a4a4a;
            --utc-light: #f8f9fa;
            --utc-dark: #121212;
            --utc-text: #e0e0e0;
            --utc-border: #404040;
        }
        
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #0f0f0f;
            color: var(--utc-text);
        }
        
        .header {
            background: linear-gradient(135deg, var(--utc-primary), var(--utc-dark));
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.3);
            padding: 15px 0;
            border-bottom: 1px solid var(--utc-border);
        }
        
        .logo {
            text-decoration: none;
            color: white;
        }
        
        .logo i {
            font-size: 28px;
            margin-right: 10px;
            color: #ffffff;
        }
        
        .sitename {
            font-size: 1.5rem;
            font-weight: 700;
            margin: 0;
            color: white;
        }
        
        .navmenu ul {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
        }
        
        .navmenu a {
            color: rgba(255, 255, 255, 0.85);
            padding: 10px 15px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s;
            border-radius: 4px;
        }
        
        .navmenu a:hover, .navmenu a.active {
            color: white;
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        .dropdown ul {
            background-color: var(--utc-secondary);
            border-radius: 5px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            min-width: 200px;
            border: 1px solid var(--utc-border);
        }
        
        .dropdown ul a {
            color: var(--utc-text);
            padding: 10px 15px;
        }
        
        .dropdown ul a:hover {
            background-color: var(--utc-accent);
            color: white;
        }
        
        .header-social-links a {
            color: rgba(255, 255, 255, 0.7);
            margin-left: 15px;
            font-size: 18px;
            transition: all 0.3s;
        }
        
        .header-social-links a:hover {
            color: white;
            transform: translateY(-2px);
        }
        
        .main {
            min-height: calc(100vh - 160px);
            padding: 30px 0;
            background-color: #0f0f0f;
        }
        
        .footer {
            background-color: var(--utc-dark);
            color: var(--utc-text);
            padding: 20px 0;
            margin-top: 30px;
            border-top: 1px solid var(--utc-border);
        }
        
        .footer a {
            color: #ffffff;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .footer a:hover {
            color: #cccccc;
        }
        
        .scroll-top {
            background-color: var(--utc-primary);
            color: white;
            width: 44px;
            height: 44px;
            border-radius: 50%;
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            transition: all 0.3s;
            z-index: 1000;
            border: 1px solid var(--utc-border);
        }
        
        .scroll-top:hover {
            background-color: var(--utc-accent);
            color: white;
            transform: translateY(-3px);
        }
        
        .card {
            border: 1px solid var(--utc-border);
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s, box-shadow 0.3s;
            background-color: var(--utc-secondary);
            color: var(--utc-text);
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }
        
        .card-header {
            background-color: var(--utc-primary);
            color: white;
            border-radius: 8px 8px 0 0 !important;
            font-weight: 600;
            border-bottom: 1px solid var(--utc-border);
        }
        
        .btn-primary {
            background-color: var(--utc-primary);
            border-color: var(--utc-primary);
            color: white;
        }
        
        .btn-primary:hover {
            background-color: var(--utc-accent);
            border-color: var(--utc-accent);
        }
        
        .btn-outline-primary {
            color: var(--utc-text);
            border-color: var(--utc-border);
        }
        
        .btn-outline-primary:hover {
            background-color: var(--utc-primary);
            border-color: var(--utc-primary);
            color: white;
        }
        
        .table {
            color: var(--utc-text);
            border-color: var(--utc-border);
        }
        
        .table thead th {
            background-color: var(--utc-primary);
            color: white;
            border: none;
        }
        
        .table tbody tr {
            background-color: var(--utc-secondary);
        }
        
        .table tbody tr:hover {
            background-color: var(--utc-accent);
        }
        
        .badge-utc {
            background-color: var(--utc-accent);
            color: white;
        }
        
        .utc-bg-primary {
            background-color: var(--utc-primary) !important;
        }
        
        .utc-text-primary {
            color: var(--utc-primary) !important;
        }
        
        .utc-bg-accent {
            background-color: var(--utc-accent) !important;
        }
        
        .utc-text-accent {
            color: var(--utc-accent) !important;
        }
        
        .mobile-nav-toggle {
            color: white;
            font-size: 24px;
            cursor: pointer;
        }
        
        .form-control {
            background-color: var(--utc-secondary);
            border: 1px solid var(--utc-border);
            color: var(--utc-text);
        }
        
        .form-control:focus {
            background-color: var(--utc-secondary);
            border-color: var(--utc-accent);
            color: var(--utc-text);
            box-shadow: 0 0 0 0.25rem rgba(74, 74, 74, 0.25);
        }
        
        .form-label {
            color: var(--utc-text);
        }
        
        .modal-content {
            background-color: var(--utc-secondary);
            border: 1px solid var(--utc-border);
            color: var(--utc-text);
        }
        
        .modal-header {
            border-bottom: 1px solid var(--utc-border);
            background-color: var(--utc-primary);
            color: white;
        }
        
        .modal-footer {
            border-top: 1px solid var(--utc-border);
        }
        
        @media (max-width: 991px) {
            .navmenu ul {
                flex-direction: column;
                background-color: var(--utc-dark);
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                padding: 10px 0;
                display: none;
                border-top: 1px solid var(--utc-border);
            }
            
            .navmenu ul.show {
                display: flex;
            }
            
            .dropdown ul {
                position: static;
                box-shadow: none;
                background-color: rgba(0, 0, 0, 0.2);
                margin: 5px 15px;
            }
        }
        
        /* Estilo para DataTables con tema oscuro */
        .dataTables_wrapper .dataTables_length, 
        .dataTables_wrapper .dataTables_filter, 
        .dataTables_wrapper .dataTables_info, 
        .dataTables_wrapper .dataTables_processing, 
        .dataTables_wrapper .dataTables_paginate {
            color: var(--utc-text) !important;
        }
        
        .dataTables_wrapper .dataTables_filter input {
            background-color: var(--utc-secondary);
            border: 1px solid var(--utc-border);
            color: var(--utc-text);
        }
        
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            color: var(--utc-text) !important;
        }
        
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: var(--utc-primary) !important;
            color: white !important;
        }
    </style>

    @stack('styles')
</head>

<body class="index-page">
    <!-- Header -->
    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid d-flex justify-content-between align-items-center">

            <a href="{{ url('/') }}" class="logo d-flex align-items-center me-auto me-xl-0">
                <i class="fas fa-university"></i>
                <h1 class="sitename">Sistema Universidad UTC</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ url('/') }}" class="active"><i class="bi bi-house-door me-1"></i> Inicio</a></li>
                    <li><a href="#"><i class="bi bi-book me-1"></i> Facultades</a></li>
                    <li><a href="#"><i class="bi bi-calendar-event me-1"></i> Carreras</a></li>
                    <li><a href="#"><i class="bi bi-info-circle me-1"></i> Profesores</a></li>
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
            <p>&copy; <strong class="sitename">Universidad UTC</strong> 2025</p>
            <p>Desarrollado por <a href="#">Departamento de Tecnología</a></p>
            <div class="mt-2">
                <a href="#" class="text-white me-3"><i class="bi bi-envelope me-1"></i> Contacto</a>
                <a href="#" class="text-white me-3"><i class="bi bi-shield-check me-1"></i> Privacidad</a>
                <a href="#" class="text-white"><i class="bi bi-file-text me-1"></i> Términos</a>
            </div>
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
    <script>
        // Función de inicialización del mapa (placeholder)
        function initMap() {
            console.log("Mapa inicializado");
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsH8p2_RvwjklyfxceCy53hpbNG_6wzCs&libraries=places&callback=initMap" async defer></script>

    <!-- Validación -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>

    <!-- Script para el menú móvil -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileNavToggle = document.querySelector('.mobile-nav-toggle');
            const navMenu = document.querySelector('.navmenu ul');
            
            if (mobileNavToggle && navMenu) {
                mobileNavToggle.addEventListener('click', function() {
                    navMenu.classList.toggle('show');
                });
            }
            
            // Cerrar menú al hacer clic en un enlace
            const navLinks = document.querySelectorAll('.navmenu a');
            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    if (window.innerWidth <= 991) {
                        navMenu.classList.remove('show');
                    }
                });
            });
            
            // Inicializar DataTables con tema oscuro si existe una tabla
            if ($.fn.DataTable) {
                $('.data-table').DataTable({
                    language: {
                        url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json'
                    },
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });
            }
        });
    </script>

    <!-- Estilo errores -->
    <style>
        .error {
            color: #ff6b6b;
            font-weight: bold;
        }
        .form-control.error {
            border: 1px solid #ff6b6b;
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
                showConfirmButton: false,
                background: '#1a1a1a',
                color: '#e0e0e0'
            });
        </script>
    @endif

    @stack('scripts')
</body>
</html>