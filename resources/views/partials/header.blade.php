<nav class="navbar navbar-expand-lg navbar-dark main-navbar-custom fixed-top">
    <div class="container">
        
        <a class="navbar-brand fw-bold d-flex align-items-center" href="{{ url('/') }}">
            <img src="{{ asset('images/studynest5.png') }}" 
                 alt="StudyNest Logo" 
                 class="me-2 logo-hover main-logo">
        </a>

        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" 
                data-bs-target="#mainNavbar"
                aria-controls="mainNavbar" aria-expanded="false" 
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="mainNavbar">
            <ul class="navbar-nav gap-lg-3 py-3 py-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-white nav-animate" href="{{ url('/') }}">StudyNest</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white nav-animate" href="{{ route('learning.hub') }}">Learning Hub</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white nav-animate" href="{{ route('nestchat.index') }}">Q&A Forum</a>
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
   
    /* Desktop Navbar Height */
    .main-navbar-custom {
        background-color: #1E3A8A;
        min-height: 72px; /* Standard professional height */
        z-index: 2005; /* Ensures it stays above the sidebar and content */
        transition: all 0.3s ease;
    }

    /* Logo Scaling */
    .main-logo {
        height: 60px; /* Reduced slightly for better mobile fit */
        width: auto;
        transition: transform 0.3s ease;
    }

    @media (min-width: 992px) {
        .main-navbar-custom {
            height: 100px; /* Restores your original height for desktop only */
        }
        .main-logo {
            height: 100px;
        }
    }

    /* Nav link hover underline animation */
    .nav-animate {
        position: relative;
        transition: color 0.3s ease;
        display: inline-block;
    }
    .nav-animate::after {
        content: "";
        position: absolute;
        width: 0;
        height: 2px;
        left: 0;
        bottom: 0;
        background-color: #FFD700;
        transition: width 0.3s ease;
    }
    .nav-animate:hover {
        color: #FFD700 !important;
    }
    .nav-animate:hover::after {
        width: 100%;
    }

    /* Mobile Menu Logic */
    @media (max-width: 991.98px) {
        .navbar-collapse {
            background-color: #1E3A8A;
            margin-top: 10px;
            border-top: 1px solid rgba(255,255,255,0.1);
            padding: 1rem 0;
        }
        
        /* Stop content overlap: This ensures the menu pushes content down */
        .navbar-nav {
            width: 100%;
        }
    }
</style>
