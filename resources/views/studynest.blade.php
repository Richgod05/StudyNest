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

<!-- About Us Section -->
<section class="about-us py-5 mb-5" style="background-color: #f9fafb;">
    <div class="container text-center">
        <h2 class="fw-bold position-relative d-inline-block pb-2 mb-4" style="color: #1E3A8A;">
            About Us
            <span style="position:absolute; left:0; right:0; bottom:0; height:3px; background:#1E3A8A; width:60%; margin:auto;"></span>
        </h2>
        <h5 class="text-muted mb-4">Who we are?</h5>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <p class="lead">
                    At <strong>StudyNest</strong>, we believe that every learner has the potential to soar.  
                    Our mission is to transform curiosity into confidence by offering a vibrant, supportive space  
                    for students to connect, share resources, and grow together.
                </p>
            </div>
        </div>
    </div>
</section>

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
                    <p class="mb-3"><i class="bi bi-envelope-fill text-primary me-2"></i> <strong>Email:</strong> info@studynest.com</p>
                    <p class="mb-3"><i class="bi bi-telephone-fill text-primary me-2"></i> <strong>Phone:</strong> +255 757 994 519</p>
                    <p class="mb-0"><i class="bi bi-geo-alt-fill text-primary me-2"></i> <strong>Location:</strong> Tanzania, Dodoma - NaneNane Bus-Terminal</p>
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
@endsection