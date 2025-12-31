@extends('layouts.layout')

@section('content')
    

    <div class="container py-5">
        <!-- Page Header -->
        <div class="text-center mb-5 fade-in-down">
            <h2 class="fw-bold position-relative d-inline-block" style="color:#1E3A8A;">
                <i class="bi bi-speedometer2 me-2"></i> Admin Dashboard
                <span class="position-absolute bottom-0 start-0 w-50 border-bottom border-3 border-primary"></span>
            </h2>
            <p class="text-muted">Manage books, categories, and resources with ease</p>
        </div>

        <!-- Dashboard Cards -->
        <div class="row g-4">
            <!-- Add Book -->
            <div class="col-md-4">
                <div class="card shadow-lg border-0 h-100 text-center hover-card">
                    <div class="card-body">
                        <i class="bi bi-book-half display-4 text-primary mb-3"></i>
                        <h5 class="card-title fw-bold">Add Book</h5>
                        <p class="text-muted">Upload new study materials and resources for students.</p>
                        <a href="{{ route('admin.uploadBook') }}" class="btn btn-primary fw-bold">
                            <i class="bi bi-plus-circle me-1"></i> Upload Book
                        </a>
                    </div>
                </div>
            </div>

            <!-- Add Category -->
            <div class="col-md-4">
                <div class="card shadow-lg border-0 h-100 text-center hover-card">
                    <div class="card-body">
                        <i class="bi bi-tags-fill display-4 text-success mb-3"></i>
                        <h5 class="card-title fw-bold">Add Category</h5>
                        <p class="text-muted">Organize books into categories for easier navigation.</p>
                        <a href="{{ route('admin.addCategory') }}" class="btn btn-success fw-bold">
                            <i class="bi bi-plus-circle me-1"></i> Add Category
                        </a>
                    </div>
                </div>
            </div>

            <!-- Learning Hub -->
            <div class="col-md-4">
                <div class="card shadow-lg border-0 h-100 text-center hover-card">
                    <div class="card-body">
                        <i class="bi bi-journal-bookmark-fill display-4 text-info mb-3"></i>
                        <h5 class="card-title fw-bold">Learning Hub</h5>
                        <p class="text-muted">Browse all uploaded books and resources.</p>
                        <a href="{{ route('learning.hub') }}" class="btn btn-info fw-bold text-white">
                            <i class="bi bi-eye me-1"></i> View Hub
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Extra Actions -->
        <div class="row g-4 mt-4">
            <!-- Manage Users -->
            <div class="col-md-4">
                <div class="card shadow-lg border-0 h-100 text-center hover-card">
                    <div class="card-body">
                        <i class="bi bi-people-fill display-4 text-warning mb-3"></i>
                        <h5 class="card-title fw-bold">Manage Users</h5>
                        <p class="text-muted">View and manage registered users in the system.</p>
                        <a href="#" class="btn btn-warning fw-bold text-dark">
                            <i class="bi bi-person-lines-fill me-1"></i> Manage
                        </a>
                    </div>
                </div>
            </div>

            <!-- Reports -->
            <div class="col-md-4">
                <div class="card shadow-lg border-0 h-100 text-center hover-card">
                    <div class="card-body">
                        <i class="bi bi-bar-chart-fill display-4 text-danger mb-3"></i>
                        <h5 class="card-title fw-bold">Reports</h5>
                        <p class="text-muted">Generate insights and track platform usage.</p>
                        <a href="#" class="btn btn-danger fw-bold">
                            <i class="bi bi-graph-up-arrow me-1"></i> View Reports
                        </a>
                    </div>
                </div>
            </div>

            <!-- Settings -->
            <div class="col-md-4">
                <div class="card shadow-lg border-0 h-100 text-center hover-card">
                    <div class="card-body">
                        <i class="bi bi-gear-fill display-4 text-secondary mb-3"></i>
                        <h5 class="card-title fw-bold">Settings</h5>
                        <p class="text-muted">Customize your admin preferences and system options.</p>
                        <a href="#" class="btn btn-secondary fw-bold">
                            <i class="bi bi-sliders me-1"></i> Configure
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom Hover Effect -->
    <style>
        .hover-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .hover-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.15);
        }
    </style>
@endsection