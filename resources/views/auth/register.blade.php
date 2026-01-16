@extends('layouts.master')


@section('content')
    <section class="write-page-hero">
        {{-- <div class="container">
            <h1 class="mt-3"><i class="fas fa-pen-fancy"></i> Create Your Story</h1>
            <p>Share your thoughts, ideas, and experiences with the world</p>
        </div> --}}
    </section>

    <!-- Write Container -->
    <div class="container" style="margin-top: -20px;">
        <div class="write-container">
            <a href="/" class="back-link text-dark"><i class="fas fa-arrow-left"></i> Back to Home</a>
            <!-- Header -->
            <div class="write-header">
                <h2>User Registration</h2>
            </div>

            {{-- ----------------------------------- Form ----------------------------------- --}}
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf

                <!-- Image -->
                {{-- <h4>Profile Image</h4>
                <input type="file" class="title-input"  id="image" name="image"
                    value="{{ old('image') }}">

                @error('image')
                    <span style="color: red"><strong>{{ $message }}</strong></span>
                @enderror --}}

                <!-- Name -->
                <input type="text" class="title-input" placeholder="Enter Name." id="name" name="name"
                    value="{{ old('name') }}">

                @error('name')
                    <span style="color: red"><strong>{{ $message }}</strong></span>
                @enderror

                <!-- Email -->
                <input type="email" class="title-input" placeholder="Enter email." id="email" name="email"
                    value="{{ old('email') }}">

                @error('email')
                    <span style="color: red"><strong>{{ $message }}</strong></span>
                @enderror

                <!-- Password -->
                <input type="password" class="title-input" placeholder="Enter password." id="password" name="password">

                @error('password')
                    <span style="color: red"><strong>{{ $message }}</strong></span>
                @enderror


                <div class="text-center mb-3 text-bold">
                    Already registered?
                    <a href="/login" class="fw-semibold">Sign in</a>
                </div>
        </div>


        <!-- Publish Buttons -->
        <div class="publish-section mt-3">
            <button type="reset" class="btn btn-outline-danger">
                <i class="fas fa-trash"></i> Clear All
            </button>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-paper-plane"></i> Register
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
                timer: 9500
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
