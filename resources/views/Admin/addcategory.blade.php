@extends('Admin/layoutsadmin.adminlayout')

@section('content')
    
    <div class="container py-5">
        <!-- Page Header -->
        <div class="text-center mb-5 fade-in-down">
            <h2 class="fw-bold position-relative d-inline-block" style="color:#1E3A8A;">
                <i class="bi bi-tags-fill me-2"></i> Add New Category
                <span class="position-absolute bottom-0 start-0 w-50 border-bottom border-3 border-primary"></span>
            </h2>
            <p class="text-muted">Organize your books and resources into meaningful categories</p>
        </div>

        <!-- Category Form -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg border-0">
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.storeCategory') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="categoryName" class="form-label fw-semibold">
                                    <i class="bi bi-pencil-square me-2"></i> Category Name
                                </label>
                                <input 
                                    type="text" 
                                    id="categoryName" 
                                    name="name" 
                                    class="form-control border-primary rounded" 
                                    placeholder="Enter category name" 
                                    required
                                >
                            </div>
                            <button type="submit" class="btn btn-primary w-100 fw-bold">
                                <i class="bi bi-plus-circle me-1"></i> Add Category
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection