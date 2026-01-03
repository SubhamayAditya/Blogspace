@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <!-- Sidebar -->
            @include('components.sidebar.usersidebar')

            <!-- Main Section -->
            <div class="col-md-9 col-lg-10 p-4">
                <h2 class="fw-bold">Welcome, {{ Auth::user()->name }} 👋</h2>
                <p class="text-muted">Manage your application data from here.</p>

                <div class="row mt-4">

                    <div class="col-lg-4 mb-3">
                        <div class="card stats-card shadow-sm p-3">
                            <h6 class="text-muted">Total Blogs</h6>
                            <h2 class="fw-bold">{{ $userBlogs }}</h2>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-3">
                        <div class="card stats-card shadow-sm p-3">
                            <h6 class="text-muted">Total Blogs Views</h6>
                            <h2 class="fw-bold">{{ $userBlogsViews }}</h2>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-3">
                        <div class="card stats-card shadow-sm p-3">
                            <h6 class="text-muted">Total Comments</h6>
                            <h2 class="fw-bold">{{ $BlogsComments }}</h2>
                        </div>
                    </div>
                    {{-- 
                    <div class="col-lg-4 mb-3">
                        <div class="card stats-card shadow-sm p-3">
                            <h6 class="text-muted">Total Blogs Reaction</h6>
                            <h2 class="fw-bold">{{ $AllUserReaction }}</h2>
                        </div>
                    </div> --}}

                </div>

            </div>

        </div>
    </div>
@endsection
