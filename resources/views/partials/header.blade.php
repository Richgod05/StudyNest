<nav class="navbar navbar-expand-lg navbar-dark" 
     style="background-color: #1E3A8A; height: 100px;">
    <div class="container" style="height: 100%;">
        
        <!-- Brand / Logo -->
        <a class="navbar-brand fw-bold d-flex align-items-center" 
           href="{{ url('/') }}" style="height: 100%;">
            <img src="{{ asset('images/studynest5.png') }}" 
                 alt="StudyNest Logo" 
                 style="height: 100px; width: auto;" 
                 class="me-2">
        </a>

        <!-- Mobile Toggle -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                data-bs-target="#mainNavbar"
                aria-controls="mainNavbar" aria-expanded="false" 
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Nav Links (Centered) -->
        <div class="collapse navbar-collapse justify-content-center" id="mainNavbar">
            <ul class="navbar-nav gap-3">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ url('/') }}">StudyNest</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Learning Hub</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('nestchat.index') }}">Nest Chat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('nestdrop.index') }}">Nest Drop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Our Team</a>
                </li>
            </ul>
        </div>
    </div>
</nav>