{{-- resources/views/home.blade.php --}}
@extends('layouts.layout')

@section('content')

<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

<style>
    body {
        font-family: 'Quicksand', 'Nunito', sans-serif;
        color: #444;
    }

    h1, h2, h3, h4, h5, .fw-bold {
        font-family: 'Quicksand', sans-serif;
        font-weight: 700;
    }

    /* ====== Hero Section ====== */
    .hero {
        background: linear-gradient(135deg, #fdfbfb 0%, #ebedee 100%);
        padding: 100px 0;
    }

    .btn-primary {
        background-color: #1E3A8A;
        border: none;
        padding: 12px 30px;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #152a63;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(30, 58, 138, 0.3);
    }

    /* ====== What We Offer (Cards) ====== */
    .offer-card {
        background: #fff;
        border: none;
        border-radius: 15px;
        padding: 40px 30px;
        transition: all 0.4s ease;
        height: 100%;
        text-align: center;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
    }

    .offer-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        border-bottom: 4px solid #1E3A8A;
    }

    .offer-icon {
        font-size: 3rem;
        color: #1E3A8A;
        margin-bottom: 20px;
        display: inline-block;
    }

    /* ====== Custom Utilities ====== */
    .section-title {
        color: #1E3A8A;
        margin-bottom: 50px;
        position: relative;
    }

    .section-title::after {
        content: '';
        width: 60px;
        height: 4px;
        background: #1E3A8A;
        position: absolute;
        bottom: -15px;
        left: 50%;
        transform: translateX(-50%);
        border-radius: 2px;
    }

    /* About Us Tabs */
    .about-us .nav-link {
        cursor: pointer;
        color: #666;
        margin: 0 10px;
        border-radius: 30px;
        padding: 10px 25px;
        transition: 0.3s;
    }

    .about-us .nav-link.active-link {
        background: #1E3A8A;
        color: white;
    }

    .hover-lift {
        transition: transform 0.3s ease;
    }
    .hover-lift:hover { transform: translateY(-5px); }
</style>

<section class="hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start" data-aos="fade-right">
                <h1 class="display-4 fw-bold">Empower Your Learning with <span style="color:#1E3A8A;">StudyNest</span></h1>
                <p class="lead mt-3 text-muted">
                    Connecting curiosity with confidence. Dive into resources, join vibrant discussions, and grow with a community that cares.
                </p>
                <div class="mt-4">
                    <a href="{{ url('/learning-hub') }}" class="btn btn-primary btn-lg shadow-sm me-3">Explore Hub</a>
                    <a href="#what-we-offer" class="btn btn-outline-primary btn-lg rounded-pill">Learn More</a>
                </div>
            </div>
            <div class="col-md-6 text-center mt-5 mt-md-0" data-aos="fade-left">
                <img src="{{ asset('images/studynest3.png') }}" alt="StudyNest Logo" class="img-fluid" style="max-height: 450px;">
            </div>
        </div>
    </div>
</section>

<section id="what-we-offer" class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title fw-bold">What We Offer</h2>
            <p class="text-muted">A comprehensive ecosystem designed for student success.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="offer-card">
                    <div class="offer-icon"><i class="bi bi-book-half"></i></div>
                    <h4>Learning Hub</h4>
                    <p class="text-muted">Access a curated library of study guides, past papers, and structured notes to excel in your exams.</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="offer-card">
                    <div class="offer-icon"><i class="bi bi-chat-heart"></i></div>
                    <h4>Nest Chat</h4>
                    <p class="text-muted">Connect with peers in real-time. Share ideas, ask questions, and collaborate on difficult topics together.</p>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                <div class="offer-card">
                    <div class="offer-icon"><i class="bi bi-person-badge"></i></div>
                    <h4>Expert Mentorship</h4>
                    <p class="text-muted">Get guidance from top-performing students and educators who provide insights on how to study effectively.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="about-us py-5 mb-5" style="background-color: #fcfdfe;">
    <div class="container text-center">
        <h2 class="section-title fw-bold" data-aos="zoom-in">About Us</h2>

        <nav class="nav justify-content-center mt-4 mb-4" data-aos="fade-up">
            <a class="nav-link fw-semibold active-link" data-tab="who-we-are">Who We Are</a>
            <a class="nav-link fw-semibold" data-tab="our-mission">Our Mission</a>
            <a class="nav-link fw-semibold" data-tab="our-vision">Our Vision</a>
        </nav>

        <div id="tab-content" class="py-3" data-aos="fade-up">
            <div class="tab-pane" id="who-we-are">
                <div class="col-lg-8 mx-auto">
                    <ul class="list-unstyled fs-5">
                        <li class="mb-3"><i class="bi bi-check-circle-fill text-primary me-2"></i> Student-First Learning Hub</li>
                        <li class="mb-3"><i class="bi bi-check-circle-fill text-primary me-2"></i> Curated Resources & Guides</li>
                        <li class="mb-3"><i class="bi bi-check-circle-fill text-primary me-2"></i> Supportive Peer Community</li>
                    </ul>
                </div>
            </div>

            <div class="tab-pane d-none" id="our-mission">
                <div class="col-lg-8 mx-auto">
                    <p class="fs-5 text-muted">Empowering students by providing a trusted platform where learning is collaborative and resources are accessible to everyone.</p>
                </div>
            </div>

            <div class="tab-pane d-none" id="our-vision">
                <div class="col-lg-8 mx-auto">
                    <p class="fs-5 text-muted">To be the global go-to hub for students, fostering growth, innovation, and lifelong learning through technology.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="testimonials py-5 mb-5">
    <div class="container text-center">
        <h2 class="section-title fw-bold" data-aos="zoom-in">Testimonials</h2>
        <div class="row g-4 mt-2">
            <div class="col-md-4" data-aos="fade-up">
                <div class="p-4 border-0 rounded shadow-sm h-100 hover-lift bg-light">
                    <p class="fst-italic text-muted">"StudyNest has completely transformed my study habits. The community is so supportive."</p>
                    <h6 class="mt-3 mb-0 fw-bold" style="color:#1E3A8A;">— Sarah L.</h6>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="p-4 border-0 rounded shadow-sm h-100 hover-lift bg-light">
                    <p class="fst-italic text-muted">"From the Learning Hub to Nest Chat, every feature keeps students engaged."</p>
                    <h6 class="mt-3 mb-0 fw-bold" style="color:#1E3A8A;">— James K.</h6>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="p-4 border-0 rounded shadow-sm h-100 hover-lift bg-light">
                    <p class="fst-italic text-muted">"The design and resources make StudyNest my daily go-to for learning."</p>
                    <h6 class="mt-3 mb-0 fw-bold" style="color:#1E3A8A;">— Amina R.</h6>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        AOS.init({ duration: 800, once: true });

        // About Us Tabs Logic
        const links = document.querySelectorAll('.about-us .nav-link');
        const panes = document.querySelectorAll('.about-us .tab-pane');

        links.forEach(link => {
            link.addEventListener('click', () => {
                links.forEach(l => l.classList.remove('active-link'));
                panes.forEach(p => p.classList.add('d-none'));
                link.classList.add('active-link');
                document.getElementById(link.dataset.tab).classList.remove('d-none');
            });
        });
    });
</script>

@endsection