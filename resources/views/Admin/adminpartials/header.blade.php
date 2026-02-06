<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #1E3A8A;">
    <div class="container">
        <!-- Brand / Logo -->
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}" aria-label="StudyNest Home">
            <img src="{{ asset('images/studynest5.png') }}"
                 alt="StudyNest Logo"
                 class="logo me-2"
                 loading="lazy">
            <span class="brand-text fw-bold">StudyNest</span>
        </a>

        <!-- Mobile Toggle -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#mainNavbar"
                aria-controls="mainNavbar" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Nav Links and Profile -->
        <div class="collapse navbar-collapse" id="mainNavbar">
            <!-- Centered Links -->
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-3">
                <li class="nav-item">
                    <a class="nav-link text-white nav-animate" href="{{ url('/') }}">Dashboard</a>
                </li>
                <!-- add more links here -->
            </ul>

            <!-- Admin Profile (right) -->
            @php
                
                $adminName = auth()->check() && !empty(auth()->user()->name) ? auth()->user()->name : 'Admin';
                // change 'profile_photo' to your actual avatar column if different
                $adminImage = auth()->check() && !empty(auth()->user()->profile_photo)
                              ? (Str::startsWith(auth()->user()->profile_photo, ['http', '/']) ? auth()->user()->profile_photo : asset('storage/' . auth()->user()->profile_photo))
                              : asset('images/profile.png');
            @endphp

            <div class="d-flex align-items-center">
                <div class="me-3 text-white text-end d-none d-lg-block admin-greeting">
                    <div class="small">Hello,</div>
                    <div class="fw-semibold">@if($adminName === 'Admin') Admin @else {{ $adminName }} @endif</div>
                </div>

                <div class="dropdown">
                    <a class="d-flex align-items-center text-decoration-none dropdown-toggle" href="#"
                       id="adminDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ $adminImage }}" alt="Admin avatar" class="rounded-circle admin-avatar"
                             onerror="this.onerror=null;this.src='{{ asset('images/profile.png') }}'">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="adminDropdown">
                        <li><a class="dropdown-item" href="#"><i class="bi bi-person-circle me-2"></i> Profile</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i> Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item text-danger" href="#"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right me-2"></i> Logout
                            </a>
                        </li>
                    </ul>

                    <form id="logout-form" action="#" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>

<style>
    /* --- Header sizing & spacing --- */
    .navbar { padding-top: .6rem; padding-bottom: .6rem; }
    .logo { height: 64px; width: auto; transition: transform .25s ease; }
    .logo:hover { transform: scale(1.03); }

    .brand-text { color: #fff; font-size: 1.05rem; letter-spacing: .2px; }

    /* Nav link underline animation */
    .nav-animate {
        position: relative;
        transition: color .25s ease;
        padding-bottom: .25rem;
    }
    .nav-animate::after {
        content: "";
        position: absolute;
        width: 0;
        height: 2px;
        left: 0;
        bottom: 0;
        background-color: #FFD700;
        transition: width .25s ease;
    }
    .nav-animate:hover {
        color: #FFD700 !important;
    }
    .nav-animate:hover::after { width: 100%; }

    /* Admin avatar & greeting */
    .admin-avatar {
        width: 44px;
        height: 44px;
        object-fit: cover;
        border-radius: 50%;
        border: 2px solid rgba(255,255,255,0.12);
    }
    .admin-greeting .small { font-size: .75rem; opacity: .85; }
    .admin-greeting .fw-semibold { font-size: .9rem; line-height: 1; }

    /* Responsive tweaks */
    @media (max-width: 991.98px) {
        .admin-greeting { display: none; } /* hide greeting on small screens */
        .logo { height: 56px; }
        .navbar { padding-top: .45rem; padding-bottom: .45rem; }
    }
</style>
