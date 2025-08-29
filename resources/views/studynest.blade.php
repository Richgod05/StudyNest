{{-- resources/views/home.blade.php --}}
@extends('layouts.layout')

@section('content')
<section class="hero py-5">
    <div class="container">
        <div class="row align-items-center">
            <!-- Image on Left -->
            <div class="col-md-6 text-center text-md-start mb-4 mb-md-0">
                <img src="{{ asset('images/studynest3.png') }}" 
                     alt="StudyNest Logo" 
                     class="img-fluid rounded" 
                     style="border-radius: 15px;">
            </div>

            <!-- Text on Right -->
            <div class="col-md-6 text-center text-md-start">
                <h1 class="fw-bold">Welcome to <span style="color:#1E3A8A;">StudyNest</span></h1>
                <p class="lead mt-3">
                    Your digital learning hub — connecting curiosity with confidence. 
                    Dive into resources, join vibrant discussions, and grow your knowledge with a supportive community.
                </p>
                <a href="{{ url('/learning-hub') }}" class="btn btn-primary btn-lg mt-3">
                    Explore Learning Hub
                </a>
            </div>
        </div>
    </div>
</section>
    <!-- About Us Main Section -->
<section class="about-us py-5 mb-5" style="background-color: #f9fafb;">
    <div class="container text-center">
        <h2 class="fw-bold position-relative d-inline-block pb-2 mb-4" style="color: #1E3A8A;">
            About Us
            <span style="position:absolute; left:0; right:0; bottom:0; height:3px; background:#1E3A8A; width:60%; margin:auto;"></span>
        </h2>

        <!-- Tab Navigation -->
        <nav class="nav justify-content-center mt-4 mb-4">
            <a class="nav-link fw-semibold active-link" data-tab="who-we-are">Who We Are</a>
            <a class="nav-link fw-semibold" data-tab="our-mission">Our Mission</a>
            <a class="nav-link fw-semibold" data-tab="our-vision">Our Vision</a>
        </nav>

        <!-- Tab Content -->
        <div id="tab-content">
            <!-- Who We Are -->
            <div class="tab-pane" id="who-we-are">
                <div class="col-lg-8 mx-auto">
                    <ul class="list-unstyled fs-6 text-center">
                        <li class="mb-3"><i class="bi bi-people-fill text-primary me-2"></i><strong>Student‑First Learning Hub</strong> — Built around students’ needs for accessible and engaging learning.</li>
                        <li class="mb-3"><i class="bi bi-journals text-primary me-2"></i><strong>Curated Resources & Guides</strong> — Organized study materials to help you learn faster and smarter.</li>
                        <li class="mb-3"><i class="bi bi-chat-dots-fill text-primary me-2"></i><strong>Supportive Peer Community</strong> — Connect, share ideas, and get help when you need it.</li>
                        <li class="mb-3"><i class="bi bi-lightning-charge-fill text-primary me-2"></i><strong>Fast, Mobile‑Friendly Access</strong> — Learn anywhere, anytime, on any device.</li>
                    </ul>
                </div>
            </div>

            <!-- Our Mission -->
            <div class="tab-pane d-none" id="our-mission">
                <div class="col-lg-8 mx-auto">
                    <p class="fs-6 text-muted text-center">
                        Our mission is to empower students by providing a trusted platform where learning is collaborative, resources are accessible, and curiosity is encouraged. We aim to bridge the gap between knowledge seekers and the tools they need to succeed.
                    </p>
                </div>
            </div>

            <!-- Our Vision -->
            <div class="tab-pane d-none" id="our-vision">
                <div class="col-lg-8 mx-auto">
                    <p class="fs-6 text-muted text-center">
                        We envision a world where every learner has equal access to quality education, supportive communities, and the confidence to achieve their goals. StudyNest strives to be the go‑to hub for students worldwide, fostering growth, innovation, and lifelong learning.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .nav-link {
        padding: 8px 16px;
        border-radius: 6px;
        cursor: pointer;
        transition: background-color 0.3s ease, color 0.3s ease;
    }
    .nav-link:hover {
        background-color: #e5e7eb;
    }
    .active-link {
        background-color: #1E3A8A;
        color: #fff !important;
    }
</style>

<!-- Testimonials Section -->
<section class="testimonials py-5 mb-5" style="background-color: #ffffff;">
    <div class="container text-center">
        <h2 class="fw-bold position-relative d-inline-block pb-2 mb-4" style="color: #1E3A8A;">
            Testimonials
            <span style="position:absolute; left:0; right:0; bottom:0; height:3px; background:#1E3A8A; width:60%; margin:auto;"></span>
        </h2>
        <h5 class="text-muted mb-5">What Our Users Say</h5>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="p-4 border rounded shadow-sm h-100">
                    <p class="fst-italic">"StudyNest has completely transformed my study habits. The community is so supportive."</p>
                    <h6 class="mt-3 mb-0 text-primary">— Sarah L.</h6>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 border rounded shadow-sm h-100">
                    <p class="fst-italic">"From the Learning Hub to Nest Chat, every feature keeps students engaged."</p>
                    <h6 class="mt-3 mb-0 text-primary">— James K.</h6>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 border rounded shadow-sm h-100">
                    <p class="fst-italic">"The design and resources make StudyNest my daily go‑to for learning."</p>
                    <h6 class="mt-3 mb-0 text-primary">— Amina R.</h6>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Enquiries Section -->
<section class="enquiries py-5 mb-5" style="background-color: #f9fafb;">
    <div class="container">
        <!-- Section Header -->
        <div class="text-center mb-5">
            <h2 class="fw-bold position-relative d-inline-block pb-2 mb-4" style="color: #1E3A8A;">
                Enquiries
                <span style="position:absolute; left:0; right:0; bottom:0; height:3px; background:#1E3A8A; width:60%; margin:auto;"></span>
            </h2>
            <h5 class="text-muted">Get in touch with Us</h5>
        </div>

        <!-- Info Left / Form Right -->
        <div class="row align-items-start">
            <!-- Contact Info -->
            <div class="col-md-5 mb-4 mb-md-0">
                <div class="p-4 border rounded shadow-sm h-100 bg-white">
                    <p class="mb-3">
                        <i class="bi bi-envelope-fill text-primary me-2"></i>
                        <strong>Email:</strong> info@studynest.com
                    </p>
                    <p class="mb-3">
                        <i class="bi bi-telephone-fill text-primary me-2"></i>
                        <strong>Phone:</strong> +255 757 994 519
                    </p>
                    <p class="mb-4">
                        <i class="bi bi-geo-alt-fill text-primary me-2"></i>
                        <strong>Location:</strong> Tanzania, Dodoma - NaneNane Bus-Terminal
                    </p>

                    <!-- Social Media Icons -->
                    <div class="mt-3">
                        <a href="https://facebook.com/YourPage" target="_blank" class="text-primary fs-4 me-3">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="https://twitter.com/YourHandle" target="_blank" class="text-info fs-4 me-3">
                            <i class="bi bi-twitter"></i>
                        </a>
                        <a href="https://instagram.com/YourProfile" target="_blank" class="text-danger fs-4 me-3">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="https://linkedin.com/in/YourProfile" target="_blank" class="text-primary fs-4">
                            <i class="bi bi-linkedin"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="col-md-7">
                <div class="p-4 border rounded shadow-sm bg-white">
                    <form>
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Your Name" required>
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" placeholder="Your Email" required>
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" rows="4" placeholder="Your Message" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary px-4">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const links = document.querySelectorAll('.about-us .nav-link');
        const panes = document.querySelectorAll('.about-us .tab-pane');

        links.forEach(link => {
            link.addEventListener('click', () => {
                // Remove active state from all links
                links.forEach(l => l.classList.remove('active-link'));
                // Hide all panes
                panes.forEach(p => p.classList.add('d-none'));

                // Activate clicked link
                link.classList.add('active-link');
                // Show the selected pane
                document.getElementById(link.dataset.tab).classList.remove('d-none');
            });
        });
    });
</script>

@endsection