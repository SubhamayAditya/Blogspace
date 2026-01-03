@extends('layouts.master')

@section('content')

<style>
    .profile-card {
        background: #ffffff;
        border-radius: 14px;
        padding: 30px;
        box-shadow: 0 6px 20px rgba(0,0,0,0.08);
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
    .profile-info h3 {
        margin-bottom: 3px;
    }
    .profile-table td {
        padding: 12px 10px;
        vertical-align: middle;
        font-size: 15px;
    }
</style>

<div class="container-fluid">
    <div class="row">

        <!-- Sidebar -->
        @include('components.sidebar.usersidebar')

        <!-- Main Section -->
        <div class="col-md-9 col-lg-10 p-4">

            <div class="profile-card">

                <!-- Profile Header -->
                <div class="profile-header mb-4">
                    <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=0D8ABC&color=fff" alt="User">
                    <div class="profile-info">
                        <h3 class="fw-bold">{{ Auth::user()->name }}</h3>
                        <p class="text-muted mb-1">{{ Auth::user()->email }}</p>
                        <span class="badge bg-primary">{{ ucfirst(Auth::user()->role) }}</span>
                    </div>
                </div>

                <hr>

                <!-- Profile Details Table -->
                <h5 class="fw-bold mb-3">Profile Details</h5>

                <table class="table profile-table">
                    <tr>
                        <td><strong>User ID:</strong></td>
                        <td>{{ Auth::user()->id }}</td>
                    </tr>
                    <tr>
                        <td><strong>Email:</strong></td>
                        <td>{{ Auth::user()->email }}</td>
                    </tr>
                    <tr>
                        <td><strong>Role:</strong></td>
                        <td>{{ ucfirst(Auth::user()->role) }}</td>
                    </tr>
                    <tr>
                        <td><strong>Account Status:</strong></td>
                        <td>
                            @if (Auth::user()->is_approved)
                                <span class="badge bg-success">Approved</span>
                            @else
                                <span class="badge bg-warning text-dark">Pending Approval</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Member Since:</strong></td>
                        <td>{{ Auth::user()->created_at->format('d M, Y') }}</td>
                    </tr>
                    <tr>
                        <td><strong>Last Updated:</strong></td>
                        <td>{{ Auth::user()->updated_at->format('d M, Y') }}</td>
                    </tr>
                </table>

                <div class="text-end mt-4">
                    <a href="{{ route('user.edit') }}" class="btn btn-primary btn-lg px-4">Edit Profile</a>
                </div>

            </div>

        </div>

    </div>
</div>

@endsection