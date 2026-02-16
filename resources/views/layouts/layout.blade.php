<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'StudyNest — From Curiosity to Confidence')</title>

    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <meta name="theme-color" content="#1E3A8A">

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <style>
        /* Global Typography */
        body {
            font-family: 'Quicksand', 'Nunito', sans-serif;
            background-color: #ffffff;
            color: #374151;
            overflow-x: hidden;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        h1, h2, h3, h4, h5, h6, .navbar-brand, .nav-link, .btn {
            font-family: 'Quicksand', sans-serif;
            font-weight: 700;
        }

        /* Content Wrapper */
        main {
            flex: 1; /* Pushes footer to bottom */
        }

        /* Refined Sidebar Styling */
        .sidebar {
            position: fixed;
            top: 100px; /* Aligned with your 100px navbar height */
            left: 0;
            width: 260px;
            height: calc(100vh - 100px);
            background: #fdfdfd;
            border-right: 1px solid #f1f5f9;
            padding: 30px 20px;
            overflow-y: auto;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .sidebar-title {
            font-size: 0.85rem;
            letter-spacing: 1.5px;
            color: #94a3b8;
            margin-bottom: 20px;
            font-weight: 700;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            padding: 12px 15px;
            border-radius: 12px;
            color: #4b5563;
            font-weight: 600;
            text-decoration: none;
            margin-bottom: 5px;
            transition: all 0.2s ease;
        }

        .sidebar-link i {
            margin-right: 12px;
            font-size: 1.1rem;
        }

        .sidebar-link:hover {
            background: #eff6ff;
            color: #1E3A8A;
            transform: translateX(5px);
        }

        .sidebar-link.active {
            background: #1E3A8A;
            color: #ffffff;
            box-shadow: 0 4px 12px rgba(30, 58, 138, 0.2);
        }

        /* Main Content Alignment with Sidebar */
        .content-with-sidebar {
            margin-left: 260px;
            padding: 40px;
        }

        /* Mobile Adjustments */
        @media (max-width: 991.98px) {
            .sidebar {
                display: none; /* Hide sidebar on mobile or convert to offcanvas */
            }
            .content-with-sidebar {
                margin-left: 0;
                padding: 20px;
            }
        }

        /* Custom Scrollbar for Sidebar */
        .sidebar::-webkit-scrollbar {
            width: 5px;
        }
        .sidebar::-webkit-scrollbar-thumb {
            background: #e2e8f0;
            border-radius: 10px;
        }
    </style>

    @yield('styles')
</head>
<body>

    @include('partials.header')

    <main>
        {{-- 
           If a page needs a sidebar, wrap its content in:
           <div class="content-with-sidebar"> ... </div>
           and include the sidebar partial.
        --}}
        @yield('content')
    </main>

    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 800,
                once: true,
                easing: 'ease-in-out'
            });
        });
    </script>
    
    @yield('scripts')

</body>
</html>