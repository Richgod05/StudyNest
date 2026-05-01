{{-- resources/views/home.blade.php --}}
@extends('layouts.layout')

@section('title', 'StudyNest — Empowering Your Learning Journey')

@section('styles')
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

<style>
:root {
    --primary: #1E3A8A;
    --primary-dark: #152a63;
}

/* Hero */
.hero {
    background: linear-gradient(135deg, #fdfbfb, #ebedee);
    padding: 80px 0;
}

/* Buttons */
.btn-primary {
    background: var(--primary);
    border: none;
    border-radius: 50px;
}
.btn-primary:hover {
    background: var(--primary-dark);
}

/* Cards */
.offer-card {
    border-radius: 15px;
    padding: 30px;
    text-align: center;
    transition: 0.3s;
}
.offer-card:hover {
    transform: translateY(-8px);
}

/* Section title */
.section-title {
    color: var(--primary);
    margin-bottom: 40px;
}

/* Floating image */
.floating {
    animation: float 5s ease-in-out infinite;
}
@keyframes float {
    50% { transform: translateY(-10px); }
}

/* Typing effect */
.typing-text {
    border-right: 2px solid var(--primary);
    white-space: nowrap;
    overflow: hidden;
    display: inline-block;
    animation: typing 2s steps(30), blink .7s infinite;
}
@keyframes typing {
    from { width: 0 }
    to { width: 100% }
}
@keyframes blink {
    50% { border-color: transparent }
}

.hero-card {
    position: absolute;
    bottom: 20px;
    left: 20px;
    animation: float 4s ease-in-out infinite;
    font-size: 0.9rem;
}

.badge {
    font-size: 0.85rem;
}

.offer-card {
    transition: all 0.3s ease;
}

.offer-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.08);
}

.offer-card i {
    display: inline-block;
    padding: 12px;
    border-radius: 12px;
    background: rgba(30,58,138,0.08);
}

</style>
@endsection


@section('content')

<!-- HERO -->
<!-- HERO -->
<section class="hero">
<div class="container">
<div class="row align-items-center">

<div class="col-md-6" data-aos="fade-right">

    <!-- Badge -->
    <span class="badge bg-primary-subtle text-primary mb-3 px-3 py-2">
        <i class="bi bi-mortarboard-fill me-1"></i>
        Built for Students
    </span>

    <!-- Heading -->
    <h1 class="fw-bold mb-3">
        <span class="typing-text">
            Empower Your Learning with <span class="text-primary">StudyNest</span>
        </span>
    </h1>

    <!-- Description -->
    <p class="text-muted">
        Unlock your full academic potential with StudyNest. 
        Access high-quality study materials, connect with a supportive student community, 
        and learn smarter with tools designed to help you succeed every day.
    </p>

    <!-- CTA Buttons -->
    <div class="mt-4">
        <a href="{{ url('/learning-hub') }}" class="btn btn-primary me-2 px-4">
            <i class="bi bi-rocket-takeoff me-1"></i>
            Get Started
        </a>
        <a href="#what-we-offer" class="btn btn-outline-primary px-4">
            <i class="bi bi-info-circle me-1"></i>
            Learn More
        </a>
    </div>

    <!-- Trust Indicators -->
    <div class="mt-4 small text-muted">
        <i class="bi bi-check-circle-fill text-success me-1"></i> Easy to use
        &nbsp;•&nbsp;
        <i class="bi bi-people-fill text-success me-1"></i> Student-focused
        &nbsp;•&nbsp;
        <i class="bi bi-journal-text text-success me-1"></i> Free resources
    </div>

</div>

<div class="col-md-6 text-center mt-5 mt-md-0 position-relative" data-aos="fade-left">

    <!-- Main Image -->
    <img src="{{ asset('images/studynest3.png') }}" 
         class="img-fluid floating" 
         style="max-height: 420px;">

    <!-- Floating Info Card -->
    <div class="hero-card shadow bg-white p-3 rounded d-none d-md-block">
        <small class="text-muted">
            <i class="bi bi-graph-up-arrow me-1"></i>
            Active Students
        </small>
        <h6 class="mb-0 text-primary fw-bold">
            10K+ Learning Daily
        </h6>
    </div>

</div>

</div>
</div>
</section>

<!-- WHAT WE OFFER -->
<section id="what-we-offer" class="py-5 bg-light">
<div class="container text-center">

    <!-- Header -->
    <div class="mb-5" data-aos="fade-up">
        <h2 class="section-title fw-bold">What We Offer</h2>
        <p class="text-muted">
            A complete learning ecosystem built to help students study smarter, collaborate better, and achieve more.
        </p>
    </div>

    <div class="row g-4">

        <!-- Learning Hub -->
        <div class="col-md-4" data-aos="fade-up">
            <div class="offer-card h-100 bg-white shadow-sm border-0 rounded-4 p-4">

                <div class="mb-3">
                    <i class="bi bi-journal-richtext fs-1 text-primary"></i>
                </div>

                <h5 class="fw-bold">Learning Hub</h5>

                <p class="text-muted small mt-2">
                    Access structured study materials, past papers, revision notes, and guides designed to help you perform better in exams.
                </p>

            </div>
        </div>

        <!-- Nest Chat -->
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
            <div class="offer-card h-100 bg-white shadow-sm border-0 rounded-4 p-4">

                <div class="mb-3">
                    <i class="bi bi-chat-dots fs-1 text-primary"></i>
                </div>

                <h5 class="fw-bold">Nest Chat</h5>

                <p class="text-muted small mt-2">
                    Join real-time discussions, ask questions, and collaborate with other students in a supportive learning environment.
                </p>

            </div>
        </div>

        <!-- Expert Mentorship -->
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
            <div class="offer-card h-100 bg-white shadow-sm border-0 rounded-4 p-4">

                <div class="mb-3">
                    <i class="bi bi-person-video3 fs-1 text-primary"></i>
                </div>

                <h5 class="fw-bold">Expert Mentorship</h5>

                <p class="text-muted small mt-2">
                    Get guidance from top students and educators who help you improve study strategies and reach your academic goals.
                </p>

            </div>
        </div>

    </div>

</div>
</section>


<!-- ABOUT -->
<section class="about-us py-5 mb-5">
<div class="container">

    <!-- Section Header -->
    <div class="row mb-5 text-center" data-aos="fade-up">
        <div class="col-lg-8 mx-auto">
            <h6 class="text-uppercase fw-bold text-primary mb-2"
                style="letter-spacing: 2px; font-size: 0.85rem;">
                Discover Our Story
            </h6>

            <h2 class="display-5 fw-bold mb-4" style="color: #1E3A8A;">
                Bridging the Gap in Digital Education
            </h2>

            <p class="text-muted lead">
                StudyNest is a dynamic ecosystem designed to transform how students interact with knowledge and each other.
            </p>
        </div>
    </div>

    <!-- Content -->
    <div class="row align-items-center g-5">

        <!-- IMAGE -->
        <div class="col-lg-6" data-aos="fade-right">
            <div class="position-relative">

                <img src="{{ asset('images/studynest3.png') }}"
                     alt="About StudyNest"
                     class="img-fluid rounded-4 shadow-lg">

                <!-- Badge -->
                <div class="position-absolute bottom-0 end-0 text-white p-4 rounded-4 shadow-lg d-none d-md-block"
                     style="transform: translate(20px, 20px);
                     background: linear-gradient(180deg, #1E3A8A, #152a63);">

                    <div class="text-center">
                        <span class="counter fw-bold fs-3" data-target="100">100</span>
                        <sup style="font-size:0.8rem;">%</sup>
                    </div>

                    <small class="text-uppercase d-block mt-2" style="opacity:0.9">
                        Student Focused
                    </small>

                </div>

            </div>
        </div>

        <!-- TEXT -->
        <div class="col-lg-6" data-aos="fade-left">

            <!-- NAV TABS (BOOTSTRAP FIXED) -->
            <ul class="nav nav-pills mb-4 p-1 bg-light rounded-pill shadow-sm"
                role="tablist"
                style="width: fit-content;">

                <li class="nav-item">
                    <button class="nav-link active fw-bold px-4 py-2 rounded-pill"
                            data-bs-toggle="pill"
                            data-bs-target="#who-we-are"
                            type="button">
                        Who We Are
                    </button>
                </li>

                <li class="nav-item">
                    <button class="nav-link fw-bold px-4 py-2 rounded-pill"
                            data-bs-toggle="pill"
                            data-bs-target="#our-mission"
                            type="button">
                        Mission
                    </button>
                </li>

                <li class="nav-item">
                    <button class="nav-link fw-bold px-4 py-2 rounded-pill"
                            data-bs-toggle="pill"
                            data-bs-target="#our-vision"
                            type="button">
                        Vision
                    </button>
                </li>

            </ul>

            <!-- TAB CONTENT -->
            <div class="tab-content">

                <!-- WHO WE ARE -->
                <div class="tab-pane fade show active" id="who-we-are">
                    <h4 class="fw-bold mb-3" style="color:#1E3A8A;">
                        A Modern Hub for Modern Learners
                    </h4>

                    <p class="text-muted" style="line-height:1.8;">
                        StudyNest was founded in Dodoma with a single vision:
                        to make quality academic resources accessible to every student, regardless of their background or location.
                        We are a passionate team of educators, developers, and students working together to build a platform that adapts to modern learning needs.
                    </p>

                    <div class="row g-3 mt-3">

                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-patch-check-fill text-primary fs-4 me-2"></i>
                                <span class="fw-semibold">Verified Resources</span>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-people-fill text-primary fs-4 me-2"></i>
                                <span class="fw-semibold">Active Community</span>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- MISSION -->
<div class="tab-pane fade" id="our-mission">

    <h4 class="fw-bold mb-3" style="color:#1E3A8A;">
        Our Mission
    </h4>

    <p class="text-muted" style="line-height:1.8;">
        Our mission is to empower students by providing accessible, reliable, and collaborative learning tools.
        We aim to bridge the gap in education through digital innovation and community-driven learning.
    </p>

    <!-- Mission Highlights -->
    <div class="mt-4">

        <div class="d-flex align-items-start mb-3">
            <i class="bi bi-journal-check text-primary fs-4 me-3"></i>
            <div>
                <h6 class="fw-bold mb-1">Accessible Learning Resources</h6>
                <small class="text-muted">
                    Providing structured notes, past papers, and study materials for every student.
                </small>
            </div>
        </div>

        <div class="d-flex align-items-start mb-3">
            <i class="bi bi-people-fill text-primary fs-4 me-3"></i>
            <div>
                <h6 class="fw-bold mb-1">Collaborative Learning</h6>
                <small class="text-muted">
                    Encouraging students to learn together through discussions and peer support.
                </small>
            </div>
        </div>

        <div class="d-flex align-items-start">
            <i class="bi bi-rocket-takeoff-fill text-primary fs-4 me-3"></i>
            <div>
                <h6 class="fw-bold mb-1">Digital Empowerment</h6>
                <small class="text-muted">
                    Using modern technology to improve learning speed, access, and quality.
                </small>
            </div>
        </div>

    </div>

</div>

            <!-- VISION -->
            <div class="tab-pane fade" id="our-vision">

                <h4 class="fw-bold mb-3" style="color:#1E3A8A;">
                    Our Vision
                </h4>

                <p class="text-muted" style="line-height:1.8;">
                    We envision a world where every learner has equal access to quality education,
                    where collaboration replaces isolation, and where knowledge is freely shared across borders.
                </p>

                <!-- Vision Highlights -->
                <div class="mt-4">

                    <div class="d-flex align-items-start mb-3">
                        <i class="bi bi-globe2 text-primary fs-4 me-3"></i>
                        <div>
                            <h6 class="fw-bold mb-1">Global Learning Access</h6>
                            <small class="text-muted">
                                Breaking barriers so students everywhere can access high-quality education resources.
                            </small>
                        </div>
                    </div>

                    <div class="d-flex align-items-start mb-3">
                        <i class="bi bi-people-fill text-primary fs-4 me-3"></i>
                        <div>
                            <h6 class="fw-bold mb-1">Connected Student Community</h6>
                            <small class="text-muted">
                                Building a strong network where learners collaborate, share ideas, and grow together.
                            </small>
                        </div>
                    </div>

                    <div class="d-flex align-items-start">
                        <i class="bi bi-lightbulb-fill text-primary fs-4 me-3"></i>
                        <div>
                            <h6 class="fw-bold mb-1">Innovation in Education</h6>
                            <small class="text-muted">
                                Using technology to transform traditional learning into a smarter, faster experience.
                            </small>
                        </div>
                    </div>
                </div>
            </div>

            </div>

        </div>

    </div>

</div>
</section>


<!-- TESTIMONIALS -->
<section class="py-5 bg-light">
    <div class="container text-center">

        <!-- Header -->
    <div class="mb-5" data-aos="fade-up">
        <h2 class="section-title fw-bold">What Our Users Say</h2>
        <p class="text-muted">
            Their experience with us.
        </p>
    </div>

        <div class="row g-4">

            <!-- Testimonial 1 -->
            <div class="col-md-4" data-aos="fade-up">
                <div class="p-4 bg-white shadow-sm rounded hover-lift">
                    <p class="text-muted fst-italic">
                        "StudyNest changed how I study! The resources are fantastic, and the community is so helpful!"
                    </p>
                    <strong class="text-primary d-block mb-2">— Sarah</strong>
                    <small class="text-muted">Student at XYZ University</small>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="p-4 bg-white shadow-sm rounded hover-lift">
                    <p class="text-muted fst-italic">
                        "Amazing platform for students. The Learning Hub and chat features make studying much more engaging."
                    </p>
                    <strong class="text-primary d-block mb-2">— James</strong>
                    <small class="text-muted">Engineering Student</small>
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="p-4 bg-white shadow-sm rounded hover-lift">
                    <p class="text-muted fst-italic">
                        "My daily learning companion. The design is sleek, and the resources are always up to date!"
                    </p>
                    <strong class="text-primary d-block mb-2">— Amina</strong>
                    <small class="text-muted">Medical Student</small>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection


@section('scripts')
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

<script>
AOS.init({
    duration: 800,
    once: true
});

document.addEventListener('DOMContentLoaded', function() {
    // Select all the tabs and contents
    const tabs = document.querySelectorAll('.about-us .nav-link');
    const contents = document.querySelectorAll('.about-us .tab-pane');

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            // Remove 'active' class from all tabs and add it to the clicked one
            tabs.forEach(t => t.classList.remove('active-tab', 'text-white'));
            tab.classList.add('active-tab', 'text-white');
            
            // Hide all tab contents
            contents.forEach(c => c.classList.add('d-none'));
            contents.forEach(c => c.classList.remove('show'));

            // Get the target tab content
            const target = tab.getAttribute('data-tab');
            const targetContent = document.getElementById(target);
            
            // Show the target content
            if (targetContent) {
                targetContent.classList.remove('d-none');
                setTimeout(() => targetContent.classList.add('show'), 10);
            }
        });
    });
});
</script>
@endsection