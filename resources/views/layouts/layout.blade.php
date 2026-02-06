<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'StudyNest')</title>

    <!-- Favicons -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('android-chrome-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('android-chrome-512x512.png') }}">
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <meta name="theme-color" content="#0B3D91">
    <meta name="msapplication-TileColor" content="#0B3D91">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom Styles for Child Views -->
    @yield('styles')
</head>
<body style="font-family: 'Nunito', sans-serif;">
    {{-- Default font: Nunito --}}
    {{-- To use other fonts, override in child views or inline styles:
         e.g., style="font-family: 'Poppins', sans-serif;" --}}

    @include('partials.header')

    <main class="container mt-4">
        @yield('content')
    </main>

    @include('partials.footer')

    <!-- Bootstrap JS (optional, if needed for modals etc.) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom Scripts for Child Views -->
    @yield('scripts')

    <style>
    .sidebar {
        position: fixed;
        top: 70px; /* adjust if you have a navbar */
        left: 0;
        width: 250px;
        height: calc(100vh - 70px);
        background: #ffffff;
        border-right: 1px solid #e5e7eb;
        padding: 20px 15px;
        overflow-y: auto;
        box-shadow: 2px 0 10px rgba(0, 0, 0, 0.05);
        z-index: 1000;
    }

    .sidebar-title {
        font-weight: 700;
        color: #1E3A8A;
        margin-bottom: 15px;
    }

    .sidebar-link {
        display: block;
        padding: 8px 10px;
        border-radius: 6px;
        color: #1f2933;
        font-weight: 600;
        text-decoration: none;
        transition: background 0.2s ease;
    }

    .sidebar-link:hover {
        background: #eff6ff;
        color: #1E3A8A;
    }

    .book-link {
        display: block;
        padding: 6px 10px;
        border-radius: 6px;
        font-size: 0.9rem;
        color: #4b5563;
        text-decoration: none;
        transition: background 0.2s ease;
    }

    .book-link:hover {
        background: #f1f5f9;
        color: #1E3A8A;
    }

    /* Push main content so it doesn’t go under sidebar */
    .with-sidebar {
        margin-left: 260px; /* slightly bigger than sidebar width */
    }
</style>

</body>
</html>