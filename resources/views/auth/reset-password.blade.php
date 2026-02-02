@extends('layouts.master')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height:80vh">
    <div class="col-md-5">
        <div class="card shadow-sm p-4">

            <h4 class="fw-bold mb-4">Reset Password</h4>

            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email"
                           name="email"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label>New Password</label>
                    <input type="password"
                           name="password"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label>Confirm Password</label>
                    <input type="password"
                           name="password_confirmation"
                           class="form-control"
                           required>
                </div>

                <button class="btn btn-primary w-100">
                    Reset Password
                </button>
            </form>

        </div>
    </div>
</div>
@endsection
