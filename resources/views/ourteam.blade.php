@extends('layouts.layout')

@section('title', 'Our Team - StudyNest')

@section('content')
<section class="our-team py-5 mb-5" style="background-color: #f9fafb;">
    <div class="container">
        <!-- Page Header -->
        <div class="text-center mb-5">
            <h2 class="fw-bold position-relative d-inline-block" style="color:#1E3A8A;">
                Our Team
                <span class="position-absolute bottom-0 start-0 w-50 border-bottom border-3 border-primary"></span>
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
                        'image' => 'images/team/richgod.jpg'
                    ],
                    [
                        'name' => 'Sarah M.',
                        'position' => 'UI/UX Designer',
                        'role' => 'Designs intuitive, responsive interfaces that make learning effortless. Focused on clarity, accessibility, and engaging visual storytelling.',
                        'image' => null
                    ],
                    [
                        'name' => 'Daniel K.',
                        'position' => 'Community & Content Manager',
                        'role' => 'Builds and nurtures the StudyNest student community. Curates quality resources, moderates discussions, and drives peer‑to‑peer engagement.',
                        'image' => 'images/team/daniel.jpg'
                    ]
                ];
            @endphp

            @foreach($team as $member)
                <div class="col-12 col-md-4">
                    <div class="card team-card text-center p-4 fade-in h-100">
                        <img 
                            src="{{ asset($member['image'] && file_exists(public_path($member['image'])) ? $member['image'] : 'images/profile.png') }}" 
                            alt="{{ $member['name'] }}" 
                            class="team-photo mb-3"
                            style="width: 120px; height: 120px; object-fit: cover; border-radius: 50%;"
                        >
                        <h5 class="fw-bold mb-1" style="color:#1E3A8A; font-size: 1rem;">{{ $member['name'] }}</h5>
                        <p class="text-primary mb-2" style="font-size: 0.95rem;">{{ $member['position'] }}</p>
                        <p class="text-muted" style="font-size: 0.95rem; line-height: 1.5;">{{ $member['role'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<style>
    /* Fade-in animation */
    .fade-in {
        animation: fadeInUp 0.6s ease-in-out;
    }
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Hover lift + glow */
    .team-card {
        border: none;
        transition: transform 0.25s ease, box-shadow 0.25s ease;
        background-color: #fff;
        margin-bottom: 1.5rem; /* spacing between cards */
    }
    .team-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 25px rgba(30, 58, 138, 0.15);
    }

    /* Ensure mobile stacking looks clean */
    @media (max-width: 767.98px) {
        .team-card {
            margin-bottom: 2rem;
        }
    }
</style>
@endsection