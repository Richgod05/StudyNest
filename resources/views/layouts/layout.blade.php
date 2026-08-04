<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>@yield('title', 'StudyNest')</title>

    <!-- Favicons -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Theme tokens and minimal helpers (site-wide) -->
    <style>
        :root{
            --site-font: 'Quicksand', sans-serif;
            --header-height: 72px;
            --accent: #1E3A8A;
            --muted: #6b7280;
            --bg: #f8fafc;
            --card-bg: #ffffff;
            --surface-1: #f8fafc;
            --surface-2: #eef2ff;
            --text: #111827;
        }

        /* Theme classes */
        .theme-light {
            --bg: #f8fafc;
            --card-bg: #ffffff;
            --surface-1: #f8fafc;
            --surface-2: #eef2ff;
            --text: #111827;
            --muted: #6b7280;
            --accent: #1E3A8A;
        }

        .theme-sepia {
            --bg: #fbf6f0;
            --card-bg: #fff6ee;
            --surface-1: #fff3e6;
            --surface-2: #f7e7d0;
            --text: #3b2f2f;
            --muted: #6b4f3a;
            --accent: #8b5e34;
        }

        .theme-dark {
            --bg: #0b1220;
            --card-bg: #071022;
            --surface-1: #071428;
            --surface-2: #0b1a33;
            --text: #e6eef8;
            --muted: #9aa6b2;
            --accent: #60a5fa;
        }

        /* Apply tokens globally */
        html, body {
            font-family: var(--site-font);
            background-color: var(--bg);
            color: var(--text);
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Utility token classes */
        .bg-surface-1 { background-color: var(--surface-1) !important; }
        .bg-surface-2 { background-color: var(--surface-2) !important; }
        .card-surface { background-color: var(--card-bg) !important; color: var(--text) !important; }
        .text-muted-token { color: var(--muted) !important; }
        .accent { color: var(--accent) !important; }
        .accent-bg { background-color: var(--accent) !important; color: #fff !important; }
        .theme-transition { transition: background-color .25s ease, color .25s ease; }

        /* Layout tokens and small custom rules */
        :root { --studynest-blue: var(--accent); }

        .wrapper { margin-top: var(--header-height); }
        @media (min-width: 992px) { .wrapper { margin-top: 100px; } }

        /* Sidebar */
        .sidebar-column {
            background: var(--card-bg);
            border-right: 1px solid rgba(14,20,30,0.04);
            padding: 0;
            z-index: 100;
        }

        .sticky-wrapper {
            position: sticky;
            top: var(--header-height);
            height: calc(100vh - var(--header-height));
            overflow-y: auto;
            padding: 25px 15px;
        }

        /* Mobile sidebar */
        @media (max-width: 991px) {
            .sidebar-column {
                position: fixed;
                top: 0;
                left: -100%;
                width: 280px;
                height: 100vh;
                z-index: 2000;
                transition: 0.3s ease;
                box-shadow: 10px 0 20px rgba(0,0,0,0.1);
            }
            .sidebar-column.active { left: 0; }
            .sticky-wrapper { height: 100vh; top: 0; }
        }

        .mobile-toggle {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 2001;
            border-radius: 50%;
            width: 56px;
            height: 56px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        }

        /* Small helpers used by pages */
        .book-title-overlay{
            position:absolute;
            top:0; left:0; right:0;
            padding:1rem;
            background: linear-gradient(180deg, rgba(0,0,0,0.7), rgba(0,0,0,0));
        }

        .book-image-wrap{
            height:420px;
            overflow:hidden;
            background: linear-gradient(180deg,var(--surface-1) 0%,var(--surface-2) 100%);
        }

        .book-image{
            width:100%;
            height:100%;
            object-fit:cover;
            transition: transform .6s ease;
        }

        .hover-card:hover .book-image{ transform: scale(1.03); }

        /* Print */
        @media print{
            body *{ visibility:hidden; }
            .book-description, .book-description *{ visibility:visible; }
            .book-description{ position:relative; left:0; top:0; width:100%; box-shadow:none; background:#fff; color:#000; }
        }
    </style>
</head>

<body class="theme-light theme-transition">

@include('partials.header')

<div class="wrapper">
    <div class="container-fluid">
        <div class="row g-0">

            @if(Request::is('learning-hub*'))

                <!-- SIDEBAR -->
                <aside class="col-lg-3 col-xl-2 sidebar-column card-surface" id="hubSidebar">
                    <div class="sticky-wrapper">
                        @include('partials.sidebar')
                    </div>
                </aside>

                <!-- CONTENT -->
                <main class="col-lg-9 col-xl-10 p-4">
                    @yield('content')
                </main>

                <!-- MOBILE BUTTON -->
                <button class="btn btn-primary d-lg-none mobile-toggle" onclick="toggleSidebar()" aria-label="Open sidebar">
                    <i class="bi bi-list fs-3"></i>
                </button>

            @else

                <main class="col-12 p-4">
                    @yield('content')
                </main>

            @endif

        </div>
    </div>
</div>

@include('partials.footer')

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Theme switcher script (applies saved theme and exposes API) -->
<script>
  (function(){
    const STORAGE_KEY = 'site_theme';
    const defaultTheme = 'theme-light';

    function applyTheme(theme) {
      document.documentElement.classList.remove('theme-light','theme-sepia','theme-dark');
      document.documentElement.classList.add(theme || defaultTheme);
      document.body.classList.remove('theme-light','theme-sepia','theme-dark');
      document.body.classList.add(theme || defaultTheme);
      document.documentElement.setAttribute('data-theme', theme || defaultTheme);
    }

    const saved = localStorage.getItem(STORAGE_KEY) || defaultTheme;
    applyTheme(saved);

    window.SiteTheme = {
      get: () => (localStorage.getItem(STORAGE_KEY) || defaultTheme),
      set: (theme) => {
        if (!['theme-light','theme-sepia','theme-dark'].includes(theme)) return;
        localStorage.setItem(STORAGE_KEY, theme);
        applyTheme(theme);
      },
      reset: () => { localStorage.removeItem(STORAGE_KEY); applyTheme(defaultTheme); }
    };

    // Follow OS preference on first visit if no saved theme
    if (!localStorage.getItem(STORAGE_KEY)) {
      const prefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
      if (prefersDark) { SiteTheme.set('theme-dark'); }
    }
  })();
</script>

<script>
function toggleSidebar() {
    const sidebar = document.getElementById('hubSidebar');
    if (!sidebar) return;
    sidebar.classList.toggle('active');
}

document.addEventListener('click', function(e) {
    const sidebar = document.getElementById('hubSidebar');
    const btn = document.querySelector('.mobile-toggle');

    if (window.innerWidth < 992 && sidebar && sidebar.classList.contains('active')) {
        if (!sidebar.contains(e.target) && (!btn || !btn.contains(e.target))) {
            sidebar.classList.remove('active');
        }
    }
});
</script>

</body>
</html>
