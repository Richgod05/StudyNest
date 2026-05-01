@extends('layouts.layout')

@section('title', 'Our Team - StudyNest')

@section('content')

<section class="our-team py-5" style="background: #f9fafb;">
<div class="container">

    <!-- HEADER -->
    <div class="text-center mb-5" data-aos="fade-up">

        <h2 class="fw-bold position-relative d-inline-block" style="color:#1E3A8A;">
            <i class="bi bi-people-fill me-2"></i> Our Team
            <span class="position-absolute bottom-0 start-50 translate-middle-x border-bottom border-3 border-primary" style="width:60%;"></span>
        </h2>

        <p class="text-muted mt-3">
            The people behind StudyNest — designers, developers, and educators building the future of learning.
        </p>

    </div>

    <!-- TEAM GRID -->
    <div class="row g-4">

        @php
        $team = [
            [
                'name' => 'Richgod .I',
                'position' => 'Founder & Lead Developer',
                'role' => 'Leads the technical vision of StudyNest, building scalable systems, real-time features, and smooth student experiences.',
                'image' => null,
                'fun_fact' => 'Runs on coffee and late-night coding sessions ☕'
            ],
            [
                'name' => 'Sarah M.',
                'position' => 'UI/UX Designer',
                'role' => 'Designs clean, intuitive interfaces focused on accessibility, clarity, and engaging student experiences.',
                'image' => null,
                'fun_fact' => 'Obsessed with minimalist design systems 🎨'
            ],
            [
                'name' => 'Daniel K.',
                'position' => 'Community Manager',
                'role' => 'Builds and manages the StudyNest community, ensuring students stay active, supported, and engaged.',
                'image' => null,
                'fun_fact' => 'Has visited 15+ countries 🌍'
            ]
        ];
        @endphp

        @foreach($team as $member)

        <div class="col-md-4" data-aos="fade-up">

            <div class="team-card text-center p-4 h-100 bg-white shadow-sm rounded-4">

                <!-- AVATAR -->
                <div class="team-avatar mx-auto mb-3">

                    <img
                        src="{{ asset($member['image'] ?? 'images/profile.png') }}"
                        alt="{{ $member['name'] }}"
                        class="rounded-circle shadow-sm"
                        width="110"
                        height="110"
                        style="object-fit: cover; border: 3px solid #e5e7eb;"
                    >

                </div>

                <!-- NAME -->
                <h6 class="fw-bold mb-1" style="color:#1E3A8A;">
                    {{ $member['name'] }}
                </h6>

                <!-- POSITION -->
                <small class="text-primary fw-semibold d-block mb-2">
                    <i class="bi bi-briefcase-fill me-1"></i>
                    {{ $member['position'] }}
                </small>

                <!-- ROLE -->
                <p class="text-muted small" style="line-height:1.6;">
                    {{ $member['role'] }}
                </p>

                <!-- FUN FACT -->
                <div class="mt-3 p-2 rounded-3" style="background:#f1f5f9;">
                    <small class="text-muted">
                        <i class="bi bi-stars text-warning me-1"></i>
                        {{ $member['fun_fact'] }}
                    </small>
                </div>

            </div>

        </div>

        @endforeach

    </div>

</div>
</section>

<!-- STYLES -->
<style>

.team-card {
    transition: all 0.3s ease;
    border: 1px solid transparent;
}

.team-card:hover {
    transform: translateY(-8px);
    border-color: rgba(30,58,138,0.15);
    box-shadow: 0 20px 40px rgba(0,0,0,0.08);
}

.team-avatar img {
    transition: transform 0.3s ease;
}

.team-card:hover .team-avatar img {
    transform: scale(1.05);
}

</style>

@endsection