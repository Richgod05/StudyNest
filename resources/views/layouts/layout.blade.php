<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'StudyNest')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --header-height: 72px; 
            --studynest-blue: #1E3A8A;
        }

        body { 
            font-family: 'Quicksand', sans-serif; 
            background: #f8fafc; 
            margin: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        
        .wrapper {
            margin-top: 72px; /* Match the min-height of your mobile navbar */
        }
        @media (min-width: 992px) {
            .wrapper {
                margin-top: 100px; /* Match your desktop navbar height */
            }
        }
        
        /* SIDEBAR LOGIC */
        .sidebar-column {
            background: #fff;
            border-right: 1px solid #eef2f6;
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

        /* MOBILE SLIDE-OUT */
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
    </style>
</head>
<body>

    @include('partials.header')

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row g-0"> {{-- g-0 removes unwanted gaps --}}
                
                @if(Request::is('learning-hub*'))
                    {{-- SIDEBAR AREA --}}
                    <aside class="col-lg-3 col-xl-2 sidebar-column" id="hubSidebar">
                        <div class="sticky-wrapper">
                            @include('partials.sidebar')
                        </div>
                    </aside>

                    {{-- MAIN CONTENT AREA --}}
                    <main class="col-lg-9 col-xl-10 p-4">
                        @yield('content')
                    </main>

                    <button class="btn btn-primary d-lg-none mobile-toggle" onclick="toggleSidebar()">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">  
        function toggleSidebar() {
            document.getElementById('hubSidebar').classList.toggle('active');
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