@extends('layouts.master')


@section('content')
    <section class="write-page-hero">

        {{-- @if (session('error'))
            <div class="alert alert-danger text-center">{{ session('error') }}</div>
        @endif --}}
    </section>

    <!-- Write Container -->
    <div class="container" style="margin-top: -20px;">
        <div class="write-container">
            <a href="/" class="back-link text-dark"><i class="fas fa-arrow-left"></i> Back to Home</a>
            <!-- Header -->
            <div class="write-header">
                <h2>User Login</h2>
            </div>

            {{-- ----------------------------------- Form ----------------------------------- --}}
            <form method="POST" action="{{ route('login') }}" enctype="multipart/form-data">
                @csrf

                <!--  email -->
                <input type="email" class="title-input" placeholder="Enter email." id="email" name="email"
                    value="{{ old('email') }}">

                @error('email')
                    <span style="color: red">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                {{-- password --}}
                <input type="password" class="title-input" placeholder="Enter password." id="password" name="password"
                    value="{{ old('password') }}">

                @error('password')
                    <span style="color: red">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

        </div>


        <!-- Publish Buttons -->
        <div class="publish-section mt-3">
            <div class="text-center mb-3 text-bold btn">
                {{-- Forget password? --}}
                   <button type="submit" class="btn btn-secondary">

                       <a href="{{ route('password.request') }}" class="fw-semibold"  style="color: #ffff">Forget Password ?</a>
                   </button>
            </div>
            <button type="reset" class="btn btn-outline-danger">
                <i class="fas fa-trash"></i> Clear All
            </button>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-paper-plane"></i> Login
            </button>
        </div>

        </form>

        {{-- ----------------------------------- Form ----------------------------------- --}}

    </div>
    </div>
@endsection



<script>
    document.addEventListener('DOMContentLoaded', function() {
        @if (session('success'))
            // Swal.fire({
            //     toast: true,
            //     position: 'top-end',
            //     icon: 'success',
            //     title: "{{ session('success') }}",
            //     showConfirmButton: false,
            //     timer: 2500
            // });


            Swal.fire({
                title: "{{ session('success') }}",
                icon: "success",
                draggable: true,
                timer: 2500
            });
        @endif

        @if (session('error'))
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'error',
                title: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2500
            });
        @endif
    });
</script>
