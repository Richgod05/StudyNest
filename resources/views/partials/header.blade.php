<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #1E3A8A; height: 100px;">
    <div class="container" style="height: 100%;">
        
        <!-- Brand / Logo -->
        <a class="navbar-brand fw-bold d-flex align-items-center" href="{{ url('/') }}" style="height: 100%;">
            <img src="{{ asset('images/studynest5.png') }}" 
                 alt="StudyNest Logo" 
                 style="height: 100px; width: auto; transition: transform 0.3s ease;" 
                 class="me-2 logo-hover">
        </a>

        <!-- Mobile Toggle -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                data-bs-target="#mainNavbar"
                aria-controls="mainNavbar" aria-expanded="false" 
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Nav Links -->
        <div class="collapse navbar-collapse justify-content-center mobile-menu" id="mainNavbar">
            <ul class="navbar-nav gap-3">
                <li class="nav-item">
                    <a class="nav-link text-white nav-animate" href="{{ url('/') }}">StudyNest</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white nav-animate" href="#">Learning Hub</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white nav-animate" href="{{ route('nestchat.index') }}">Nest Chat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white nav-animate" href="{{ route('nestdrop.index') }}">Nest Drop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white nav-animate" href="{{ url('/ourteam') }}">Our Team</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    /* Logo hover scale */
    .logo-hover:hover {
        transform: scale(1.05);
    }

    /* Nav link hover underline animation */
    .nav-animate {
        position: relative;
        transition: color 0.3s ease;
    }
    .nav-animate::after {
        content: "";
        position: absolute;
        width: 0;
        height: 2px;
        left: 0;
        bottom: 0;
        background-color: #FFD700; /* Gold underline */
        transition: width 0.3s ease;
    }
    .nav-animate:hover {
        color: #FFD700 !important;
    }
    .nav-animate:hover::after {
        width: 100%;
    }

    /* Mobile menu background */
    @media (max-width: 991.98px) {
        .mobile-menu {
            background-color: #1E3A8A;
            padding: 1rem;
            animation: fadeDown 0.4s ease;
        }
    }

    /* Fade-down animation for mobile menu */
    @keyframes fadeDown {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>