@extends('layouts.layout')

@section('title', 'Our Team - StudyNest')

@section('content')
<section class="our-team py-5 mb-5" style="background-color: #f9fafb;">
    <div class="container">
        <!-- Page Header -->
        <div class="text-center mb-5 fade-in-down">
            <h2 class="fw-bold position-relative d-inline-block" style="color:#1E3A8A;">
                <i class="bi bi-people-fill me-2"></i> Our Team
                <span class="position-absolute bottom-0 start-50 translate-middle-x border-bottom border-3 border-primary" style="width:50%;"></span>
            </h2>
            <p class="text-muted">The people behind StudyNest — building tools to take you from curiosity to confidence</p>
        </div>

        <div class="row g-4">
            @php
                $team = [
                    [
                        'name' => 'Richgod',
                        'position' => 'Founder & Lead Developer',
                        'role' => 'Oversees the vision and technical architecture of StudyNest. Expert in Laravel workflows, real-time features, and crafting a polished, student‑friendly experience.',
                        'image' => 'images/team/richgod.jpg',
                        'fun_fact' => 'Can code for 12 hours straight fueled only by coffee ☕'
                    ],
                    [
                        'name' => 'Sarah M.',
                        'position' => 'UI/UX Designer',
                        'role' => 'Designs intuitive, responsive interfaces that make learning effortless. Focused on clarity, accessibility, and engaging visual storytelling.',
                        'image' => null,
                        'fun_fact' => 'Collects vintage cameras 📸'
                    ],
                    [
                        'name' => 'Daniel K.',
                        'position' => 'Community & Content Manager',
                        'role' => 'Builds and nurtures the StudyNest student community. Curates quality resources, moderates discussions, and drives peer‑to‑peer engagement.',
                        'image' => 'images/team/daniel.jpg',
                        'fun_fact' => 'Has visited 15 countries 🌍'
                    ]
                ];
            @endphp

            @foreach($team as $member)
                <div class="col-12 col-md-4">
                    <div class="card team-card text-center p-4 fade-in h-100">
                        <!-- Flip Card -->
                        <div class="flip-card mx-auto mb-3">
                            <div class="flip-card-inner">
                                <!-- Front -->
                                <div class="flip-card-front">
                                    <img 
                                        src="{{ asset($member['image'] && file_exists(public_path($member['image'])) ? $member['image'] : 'images/profile.png') }}" 
                                        alt="{{ $member['name'] }}" 
                                        class="team-photo shadow-sm"
                                        style="width: 120px; height: 120px; object-fit: cover; border-radius: 50%;"
                                    >
                                </div>
                                <!-- Back -->
                                <div class="flip-card-back d-flex align-items-center justify-content-center text-center p-3">
                                    <span class="text-white">{{ $member['fun_fact'] }}</span>
                                </div>
                            </div>
                        </div>

                        <h5 class="fw-bold mb-1" style="color:#1E3A8A; font-size: 1rem;">
                            <i class="bi bi-person-fill me-1 text-primary"></i> {{ $member['name'] }}
                        </h5>
                        <p class="text-primary mb-2" style="font-size: 0.95rem;">
                            <i class="bi bi-briefcase-fill me-1"></i> {{ $member['position'] }}
                        </p>
                        <p class="text-muted" style="font-size: 0.95rem; line-height: 1.5;">
                            <i class="bi bi-info-circle me-1"></i> {{ $member['role'] }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<style>
    /* Fade-in animations */
    .fade-in { animation: fadeInUp 0.6s ease-in-out; }
    .fade-in-down { animation: fadeInDown 0.6s ease-in-out; }
    @keyframes fadeInUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
    @keyframes fadeInDown { from { opacity: 0; transform: translateY(-20px); } to { opacity: 1; transform: translateY(0); } }

    /* Hover lift + glow */
    .team-card {
        border: none;
        transition: transform 0.25s ease, box-shadow 0.25s ease;
        background-color: #fff;
    }
    .team-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 25px rgba(30, 58, 138, 0.15);
    }

    /* Flip card styles */
    .flip-card {
        background-color: transparent;
        width: 120px;
        height: 120px;
        perspective: 1000px;
    }
    .flip-card-inner {
        position: relative;
        width: 100%;
        height: 100%;
        text-align: center;
        transition: transform 0.6s;
        transform-style: preserve-3d;
    }
    .flip-card:hover .flip-card-inner {
        transform: rotateY(180deg);
    }
    .flip-card-front, .flip-card-back {
        position: absolute;
        width: 100%;
        height: 100%;
        backface-visibility: hidden;
        border-radius: 50%;
    }
    .flip-card-front {
        background-color: #fff;
    }
    .flip-card-back {
        background-color: #1E3A8A;
        color: white;
        transform: rotateY(180deg);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.85rem;
        padding: 10px;
        border-radius: 50%;
    }

    /* Icon hover pulse */
    .team-card:hover i {
        animation: pulse 0.6s ease;
    }
    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.2); }
        100% { transform: scale(1); }
    }

    /* Mobile spacing */
    @media (max-width: 767.98px) {
        .team-card { margin-bottom: 2rem; }
    }
</style>
@endsection