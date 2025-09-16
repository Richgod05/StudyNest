@extends('layouts.layout')

@section('title', 'Our Team - StudyNest')

@section('styles')
<style>
    .team-card {
        border: none;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .team-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    }
    .team-photo {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border-radius: 50%;
        margin: 0 auto 15px;
    }
</style>
@endsection

@section('content')
<div class="text-center mb-5">
    <h1 class="fw-bold">Meet the StudyNest Team</h1>
    <p class="text-muted">From curiosity to confidence — powered by people who care.</p>
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
                'image' => null // No image provided
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
        <div class="col-md-4">
            <div class="card team-card text-center p-4">
                <img 
                    src="{{ asset($member['image'] && file_exists(public_path($member['image'])) ? $member['image'] : 'images/profile.png') }}" 
                    alt="{{ $member['name'] }}" 
                    class="team-photo"
                >
                <h4 class="fw-bold">{{ $member['name'] }}</h4>
                <p class="text-primary mb-1">{{ $member['position'] }}</p>
                <p class="text-muted">{{ $member['role'] }}</p>
            </div>
        </div>
    @endforeach
</div>
@endsection