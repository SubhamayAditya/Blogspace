@extends('layouts.master')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height:80vh">
    <div class="col-md-5">
        <div class="card shadow-sm p-4">

            <h4 class="fw-bold mb-3">Forgot Password</h4>
            <p class="text-muted mb-4">
                Enter your email and we’ll send a reset link.
            </p>

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
            {{-- <form method="POST" action=""> --}}
                @csrf

                <div class="mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="email"
                           name="email"
                           class="form-control"
                           required autofocus>
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button class="btn btn-primary w-100">
                    Send Reset Link
                </button>
            </form>

            <div class="text-center mt-3">
                <a href="{{ route('login') }}">Back to Login</a>
            </div>

        </div>
    </div>
</div>
@endsection
