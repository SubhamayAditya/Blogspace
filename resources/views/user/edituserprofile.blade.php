@extends('layouts.master')

@section('content')
    <style>
        .profile-card {
            background: #ffffff;
            border-radius: 14px;
            padding: 30px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
            border: 1px solid #e5e7eb;
        }

        .profile-header {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .profile-header img {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #e2e8f0;
        }
    </style>

    <div class="container-fluid">
        <div class="row">

            {{-- Sidebar --}}
            @include('components.sidebar.usersidebar')

            {{-- Main Content --}}
            <div class="col-md-9 col-lg-10 p-4">

                <div class="profile-card">

                    {{-- Header --}}
                    <div class="profile-header mb-4">
                        <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=0D8ABC&color=fff"
                            alt="User">

                        <div>
                            <h3 class="fw-bold mb-1">Edit Profile</h3>
                            <p class="text-muted mb-0"><span>Name : </span><strong>{{ Auth::user()->name }}</strong></p>
                            <p class="text-muted mb-0"><span>Email : </span><strong>{{ Auth::user()->email }}</strong></p>
                            <p class="text-muted mb-0"><span>User ID : </span><strong>{{ Auth::user()->id }}</strong></p>
                            <p class="text-muted mb-0"><span>Role : </span><strong>{{ Auth::user()->role }}</strong></p>
                            <p class="text-muted mb-0">
                                <span>Status : </span>
                                @if (Auth::user()->is_approved)
                                <span class="badge bg-success">Approved</span>
                            @else
                                <span class="badge bg-warning text-dark">Pending Approval</span>
                            @endif
                            </p>
                        </div>
                     
                    </div>

                    <hr>

                    {{-- Edit Form --}}
                    <form method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data">
                    {{-- <form method="POST" action="" enctype="multipart/form-data"> --}}
                        @csrf
                        @method('PUT')

                        <div class="row g-4">

                            {{-- Name --}}
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Full Name</label>
                                <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}"
                                    class="form-control" required>
                            </div>

                            {{-- Email --}}
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Email</label>
                                <input type="email" value="{{ Auth::user()->email }}" class="form-control" disabled>
                            </div>
                           
                            

                            {{-- Password --}}
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">New Password</label>
                                <input type="password" name="password" class="form-control"
                                    placeholder="Leave blank to keep current">
                            </div>

                            {{-- Confirm Password --}}
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control">
                            </div>

                            {{-- Profile Image --}}
                            {{-- <div class="col-md-6">
                                <label class="form-label fw-semibold">Profile Image</label>
                                <input type="file" name="image" class="form-control">
                            </div> --}}

                            {{-- Bio --}}
                            {{-- <div class="col-md-12">
                                <label class="form-label fw-semibold">Bio</label>
                                <textarea name="bio" rows="4" class="form-control" placeholder="Tell something about yourself...">{{ old('bio', Auth::user()->bio) }}</textarea>
                            </div> --}}

                        </div>

                        {{-- Buttons --}}
                        <div class="text-end mt-4">
                            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary px-4">
                                Cancel
                            </a>
                            <button type="submit" class="btn btn-primary px-5 ms-2">
                                Update Profile
                            </button>
                        </div>

                    </form>

                </div>

            </div>
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