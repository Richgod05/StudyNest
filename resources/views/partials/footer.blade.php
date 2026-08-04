<footer class="pt-5 pb-4 theme-transition" style="background-color: var(--accent); color: var(--bg); font-family: 'Quicksand', sans-serif;">
    <div class="container">
        <div class="row g-4">
            
            <div class="col-lg-4 col-md-6">
                <div class="mb-3">
                    <img src="{{ asset('images/studynest5.png') }}" alt="StudyNest Logo" style="height: 90px; width: auto; filter: brightness(0) invert(1);">
                </div>
                <p class="mb-3" style="font-size: 0.95rem; line-height: 1.8; color: rgba(248,250,252,0.9); max-width: 320px;">
                    StudyNest is a digital learning hub dedicated to connecting curiosity with confidence. We provide the tools and community support every student needs to thrive.
                </p>

                <!-- Theme switcher (compact) -->
                <div class="d-flex align-items-center gap-2 mt-3">
                    <small class="text-white-50 me-2">Theme</small>
                    <div class="btn-group" role="group" aria-label="Theme switcher">
                        <button type="button" class="btn btn-sm btn-outline-light theme-btn" data-theme="theme-light" aria-pressed="false" title="Light theme">
                            <i class="bi bi-sun-fill"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-light theme-btn" data-theme="theme-sepia" aria-pressed="false" title="Sepia theme">
                            <i class="bi bi-brush"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-light theme-btn" data-theme="theme-dark" aria-pressed="false" title="Dark theme">
                            <i class="bi bi-moon-fill"></i>
                        </button>
                    </div>
                </div>

                <div class="d-flex gap-3 mt-4">
                    <a href="#" class="text-white fs-5 hover-scale" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="text-white fs-5 hover-scale" aria-label="X / Twitter"><i class="bi bi-twitter-x"></i></a>
                    <a href="#" class="text-white fs-5 hover-scale" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                </div>
            </div>

            <div class="col-lg-2 col-md-6">
                <h6 class="fw-bold mb-4 text-white text-uppercase" style="letter-spacing: 1px; font-size: 0.9rem;">Quick Links</h6>
                <ul class="list-unstyled footer-links" style="font-size: 0.9rem;">
                    <li class="mb-2"><a href="{{ url('/') }}" class="text-decoration-none text-white nav-animate">StudyNest</a></li>
                    <li class="mb-2"><a href="{{ route('learning.hub') }}" class="text-decoration-none text-white nav-animate">Learning Hub</a></li>
                    <li class="mb-2"><a href="{{ route('nestchat.index') }}" class="text-decoration-none text-white nav-animate">Q&A Forum</a></li>
                    <li class="mb-2"><a href="{{ route('nestdrop.index') }}" class="text-decoration-none text-white nav-animate">Nest Drop</a></li>
                    <li class="mb-2"><a href="{{ url('/ourteam') }}" class="text-decoration-none text-white nav-animate">Our Team</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6">
                <h6 class="fw-bold mb-4 text-white text-uppercase" style="letter-spacing: 1px; font-size: 0.9rem;">Our Services</h6>
                <ul class="list-unstyled footer-links" style="font-size: 0.9rem;">
                    <li class="mb-2"><a href="#" class="text-decoration-none text-white nav-animate">Learning Materials</a></li>
                    <li class="mb-2"><a href="#" class="text-decoration-none text-white nav-animate">Question & Answers</a></li>
                    <li class="mb-2"><a href="#" class="text-decoration-none text-white nav-animate">Sharing Materials</a></li>
                    <li class="mb-2"><a href="#" class="text-decoration-none text-white nav-animate">Team Working</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6">
                <h6 class="fw-bold mb-4 text-white text-uppercase" style="letter-spacing: 1px; font-size: 0.9rem;">Contact Us</h6>
                <ul class="list-unstyled" style="font-size: 0.9rem; color: rgba(209,213,219,0.95);">
                    <li class="d-flex mb-3 align-items-center">
                        <i class="bi bi-geo-alt-fill text-warning me-2"></i>
                        <span>Dodoma, Nane-nane Bus stand</span>
                    </li>
                    <li class="d-flex mb-3 align-items-center">
                        <i class="bi bi-telephone-fill text-warning me-2"></i>
                        <span>+255 757 994 519</span>
                    </li>
                    <li class="d-flex mb-3 align-items-center">
                        <i class="bi bi-envelope-fill text-warning me-2"></i>
                        <span>studynest@info.com</span>
                    </li>
                </ul>
            </div>

        </div>

        <hr class="mt-5 mb-4" style="border-color: rgba(255,255,255,0.1);">

        <div class="row align-items-center" style="font-size: 0.85rem;">
            <div class="col-md-6 text-center text-md-start">
                <span class="text-white-50">
                    &copy; {{ date('Y') }} <strong>StudyNest</strong>. All rights reserved.
                </span>
            </div>
            <div class="col-md-6 text-center text-md-end mt-2 mt-md-0">
                <span class="text-white-50">
                    Built with <i class="bi bi-heart-fill text-danger heartbeat"></i> by <strong>Richgod Isaac</strong>
                </span>
            </div>
        </div>
    </div>
</footer>

<style>
    /* Professional Gold Underline matching your Navbar */
    .footer-links .nav-animate {
        position: relative;
        padding-bottom: 3px;
        transition: 0.3s;
        color: rgba(209,213,219,0.95) !important;
    }
    .footer-links .nav-animate::after {
        content: "";
        position: absolute;
        width: 0;
        height: 2px;
        left: 0;
        bottom: 0;
        background-color: #FFD700;
        transition: width 0.3s ease;
    }
    .footer-links .nav-animate:hover {
        color: #FFD700 !important;
    }
    .footer-links .nav-animate:hover::after {
        width: 100%;
    }

    .hover-scale:hover {
        transform: scale(1.1);
        color: #FFD700 !important;
    }

    .heartbeat {
        animation: heart 1.5s infinite;
        display: inline-block;
        font-size: 0.8rem;
    }
    @keyframes heart {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.3); }
    }

    /* Active theme button styling */
    .theme-btn.active {
        background-color: rgba(255,255,255,0.15);
        border-color: rgba(255,255,255,0.25);
        color: #fff;
    }
</style>

<script>
    (function () {
        // Helper to set theme using SiteTheme API if available, otherwise toggle classes directly
        function applyTheme(theme) {
            if (window.SiteTheme && typeof window.SiteTheme.set === 'function') {
                window.SiteTheme.set(theme);
            } else {
                document.documentElement.classList.remove('theme-light','theme-sepia','theme-dark');
                document.documentElement.classList.add(theme);
                document.body.classList.remove('theme-light','theme-sepia','theme-dark');
                document.body.classList.add(theme);
                localStorage.setItem('site_theme', theme);
            }
            updateActiveButtons(theme);
        }

        // Update active state on buttons
        function updateActiveButtons(activeTheme) {
            document.querySelectorAll('.theme-btn').forEach(btn => {
                const t = btn.getAttribute('data-theme');
                if (t === activeTheme) {
                    btn.classList.add('active');
                    btn.setAttribute('aria-pressed', 'true');
                } else {
                    btn.classList.remove('active');
                    btn.setAttribute('aria-pressed', 'false');
                }
            });
        }

        // Wire up buttons
        document.querySelectorAll('.theme-btn').forEach(btn => {
            btn.addEventListener('click', function () {
                const theme = this.getAttribute('data-theme');
                applyTheme(theme);
            });
        });

        // Initialize active button based on saved theme or default
        const saved = (window.SiteTheme && typeof window.SiteTheme.get === 'function') ? window.SiteTheme.get() : (localStorage.getItem('site_theme') || 'theme-light');
        updateActiveButtons(saved);
    })();
</script>
