@extends('layouts.layout')
@section('title', 'Admin Login - StudyNest')

@section('content')
<section class="hero py-5">
  <div class="container">
    <h2 class="fw-bold text-primary mb-4">Admin Login</h2>

    <form method="POST" action="{{ route('admin.authenticate') }}" class="shadow p-4 rounded bg-white">
      @csrf
      @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif

                @if (Session::has('error'))
                    <div class="alert alert-danger">{{ Session::get('error') }}</div>
                @endif

                @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control @error('email') is_invalid
        @enderror" required>
      </div>

      <div class="mb-3 position-relative">
        <label class="form-label">Password</label>
        <input type="password" id="password" name="password" 
              class="form-control @error('password') is-invalid @enderror" required>
        <i class="bi bi-eye eye-icon position-absolute top-50 end-0 translate-middle-y me-3" 
          data-target="password" style="cursor:pointer;"></i>
    </div>

      <button type="submit" class="btn btn-primary w-100">Sign up</button>
    </form>
    <div class="login-link mt-2 text-end">
                        Forgot your password?
                        <a href="{{ route('signup') }}">Recover here</a>
                    </div>
  </div>

  <!-- Password toggle script -->
    <script>
    document.querySelectorAll('.eye-icon').forEach(icon => {
        icon.addEventListener('click', () => {
            const targetId = icon.getAttribute('data-target');
            const input = document.getElementById(targetId);

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            }
        });
    });
</script>
</section>
@endsection
