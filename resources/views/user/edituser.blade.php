@extends('layouts.master')

@section('content')

<style>
    .edit-card {
        background: #ffffff;
        border-radius: 14px;
        padding: 30px;
        box-shadow: 0 6px 20px rgba(0,0,0,0.08);
        border: 1px solid #e5e7eb;
        max-width: 700px;
        margin: auto;
    }
    .profile-preview {
        width: 110px;
        height: 110px;
        border-radius: 50%;
        border: 3px solid #e2e8f0;
        object-fit: cover;
        margin-bottom: 10px;
    }
</style>

<div class="container py-5">
    <div class="edit-card">

        <!-- Page Title -->
        <h3 class="fw-bold mb-3">Edit Profile</h3>
        <p class="text-muted mb-4">Update your personal information below.</p>

        <!-- Profile Edit Form -->
        {{-- <form action="{{ route('user.update', Auth::user()->id) }}" method="POST" enctype="multipart/form-data"> --}}
        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Profile Image -->
            <div class="mb-4 text-center">
                <img src="{{ Auth::user()->image 
                    ? asset('uploads/profile/' . Auth::user()->image) 
                    : 'https://ui-avatars.com/api/?name=' . Auth::user()->name }}" 
                    class="profile-preview" id="previewImage">

                <div class="mt-3">
                    <label class="form-label fw-semibold">Change Profile Picture</label>
                    <input type="file" name="image" class="form-control" accept="image/*" onchange="previewFile(event)">
                </div>
            </div>

            <hr>

            <!-- Name -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Full Name</label>
                <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control" required>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Email</label>
                <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control" required>
            </div>

            <hr>

            <!-- Password Update -->
            <h5 class="fw-bold mt-4">Change Password <small class="text-muted">(optional)</small></h5>

            <div class="mb-3 mt-2">
                <label class="form-label">New Password</label>
                <input type="password" name="password" class="form-control" placeholder="Leave blank if not changing">
            </div>

            <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" placeholder="Leave blank if not changing">
            </div>

            <!-- Save Button -->
            <div class="text-end mt-4">
                <button type="submit" class="btn btn-primary px-4">Save Changes</button>
            </div>

        </form>
    </div>
</div>

<script>
function previewFile(event) {
    const reader = new FileReader();
    reader.onload = function() {
        document.getElementById('previewImage').src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}
</script>

@endsection
