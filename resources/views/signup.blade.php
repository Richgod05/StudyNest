@extends('layouts.layout')

@section('content')
<section class="hero py-5">
  <div class="container">
    <h2 class="fw-bold text-primary mb-4">Sign up for StudyNest</h2>

    <form method="POST" action="{{ route('signup') }}" class="shadow p-4 rounded bg-white">
      @csrf

      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required>
      </div>

      <button type="submit" class="btn btn-primary w-100">Sign up</button>
    </form>
  </div>
</section>
@endsection
