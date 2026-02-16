{{-- resources/views/home.blade.php --}}
@extends('layouts.layout')

@section('title', 'StudyNest — Empowering Your Learning Journey')

@section('styles')
<style>
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

    /* ====== Section Utilities ====== */
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

    .hover-lift {
        transition: transform 0.3s ease;
    }
    .hover-lift:hover { transform: translateY(-5px); }

    /* About Us Tab Active States */
    .about-us .nav-pills .nav-link.active-tab {
        background-color: #1E3A8A;
        color: white !important;
        box-shadow: 0 4px 10px rgba(30, 58, 138, 0.2);
    }

    .tab-pane {
        animation: fadeIn 0.5s ease;
    }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
@endsection

@section('content')

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
                    <a href="#what-we-offer" class="btn btn-outline-primary btn-lg rounded-pill px-4">Learn More</a>
                </div>
            </div>
            <div class="col-md-6 text-center mt-5 mt-md-0" data-aos="fade-left">
                <img src="{{ asset('images/studynest3.png') }}" alt="StudyNest Experience" class="img-fluid" style="max-height: 450px;">
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

<section class="about-us py-5 mb-5">
    <div class="container">
        <div class="row mb-5 text-center" data-aos="fade-up">
            <div class="col-lg-8 mx-auto">
                <h6 class="text-uppercase fw-bold text-primary mb-2" style="letter-spacing: 2px; font-size: 0.85rem;">Discover Our Story</h6>
                <h2 class="display-5 fw-bold mb-4" style="color: #1E3A8A;">Bridging the Gap in Digital Education</h2>
                <p class="text-muted lead">StudyNest is a dynamic ecosystem designed to transform how students interact with knowledge and each other.</p>
            </div>
        </div>

        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="position-relative">
                    <img src="{{ asset('images/studynest3.png') }}" alt="About StudyNest" class="img-fluid rounded-4 shadow-lg">
                    <div class="position-absolute bottom-0 end-0 bg-primary text-white p-4 rounded-4 shadow-lg d-none d-md-block" style="transform: translate(20px, 20px);">
                        <h3 class="fw-bold mb-0">100%</h3>
                        <small class="text-uppercase">Student Focused</small>
                    </div>
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-left">
                <nav class="nav nav-pills mb-4 p-1 bg-light rounded-pill shadow-sm" style="width: fit-content;">
                    <a class="nav-link active-tab fw-bold px-4 py-2 rounded-pill" data-tab="who-we-are" style="cursor: pointer;">Who We Are</a>
                    <a class="nav-link text-muted fw-bold px-4 py-2 rounded-pill" data-tab="our-mission" style="cursor: pointer;">Mission</a>
                    <a class="nav-link text-muted fw-bold px-4 py-2 rounded-pill" data-tab="our-vision" style="cursor: pointer;">Vision</a>
                </nav>

                <div id="tab-content">
                    <div class="tab-pane" id="who-we-are">
                        <h4 class="fw-bold mb-3" style="color: #1E3A8A;">A Modern Hub for Modern Learners</h4>
                        <p class="text-muted mb-4" style="line-height: 1.8;">
                            StudyNest was founded in Dodoma with a single vision: to make quality academic resources accessible to every student.
                        </p>
                        <div class="row g-3">
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

                    <div class="tab-pane d-none" id="our-mission">
                        <h4 class="fw-bold mb-3" style="color: #1E3A8A;">Our Mission</h4>
                        <p class="text-muted mb-4" style="line-height: 1.8;">
                            Our mission is to empower the next generation of professionals by providing a trusted, collaborative platform.
                        </p>
                    </div>

                    <div class="tab-pane d-none" id="our-vision">
                        <h4 class="fw-bold mb-3" style="color: #1E3A8A;">Our Vision</h4>
                        <p class="text-muted mb-4" style="line-height: 1.8;">
                            We envision a world where every learner has equal access to quality education.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="testimonials py-5 mb-5 bg-light">
    <div class="container text-center">
        <h2 class="section-title fw-bold" data-aos="zoom-in">Testimonials</h2>
        <div class="row g-4 mt-2">
            <div class="col-md-4" data-aos="fade-up">
                <div class="p-4 border-0 rounded-4 shadow-sm h-100 hover-lift bg-white">
                    <p class="fst-italic text-muted">"StudyNest has completely transformed my study habits. The community is so supportive."</p>
                    <h6 class="mt-3 mb-0 fw-bold" style="color:#1E3A8A;">— Sarah L.</h6>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="p-4 border-0 rounded-4 shadow-sm h-100 hover-lift bg-white">
                    <p class="fst-italic text-muted">"From the Learning Hub to Nest Chat, every feature keeps students engaged."</p>
                    <h6 class="mt-3 mb-0 fw-bold" style="color:#1E3A8A;">— James K.</h6>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="p-4 border-0 rounded-4 shadow-sm h-100 hover-lift bg-white">
                    <p class="fst-italic text-muted">"The design and resources make StudyNest my daily go-to for learning."</p>
                    <h6 class="mt-3 mb-0 fw-bold" style="color:#1E3A8A;">— Amina R.</h6>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tabs = document.querySelectorAll('.about-us .nav-link');
        const contents = document.querySelectorAll('.about-us .tab-pane');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                // Update Classes
                tabs.forEach(t => {
                    t.classList.remove('active-tab', 'text-white');
                    t.classList.add('text-muted');
                });
                contents.forEach(c => c.classList.add('d-none'));

                tab.classList.add('active-tab');
                tab.classList.remove('text-muted');
                
                const target = tab.getAttribute('data-tab');
                document.getElementById(target).classList.remove('d-none');
            });
        });
    });
</script>
@endsection