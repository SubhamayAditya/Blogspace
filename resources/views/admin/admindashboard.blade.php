@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <!-- Sidebar -->
            @include('components.sidebar.adminsidebar')

            <!-- Main Section -->
            <div class="col-md-9 col-lg-10 p-4">

                <h2 class="fw-bold">Welcome, {{ Auth::user()->name }} 👋</h2>
                <p class="text-muted">Manage your application data from here.</p>

                <div class="row mt-4">

                    <div class="col-lg-4 mb-3">
                        <div class="card stats-card shadow-sm p-3">
                            <h6 class="text-muted">Total Users</h6>
                            <h2 class="fw-bold">{{ $totalUsers }}</h2>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-3">
                        <div class="card stats-card shadow-sm p-3">
                            <h6 class="text-muted">Pending Approvals</h6>
                            <h2 class="fw-bold">{{ $pendingUsers }}</h2>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-3">
                        <div class="card stats-card shadow-sm p-3">
                            <h6 class="text-muted">Total Blogs</h6>
                            <h2 class="fw-bold">{{ $totalBlogs }}</h2>
                        </div>
                    </div>


                    <div class="col-lg-4 mb-3">
                        <div class="card stats-card shadow-sm p-3">
                            <h6 class="text-muted">Total Blogs Views</h6>
                            <h2 class="fw-bold">{{ $adminBlogsViews }}</h2>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-3">
                        <div class="card stats-card shadow-sm p-3">
                            <h6 class="text-muted">Total Comments</h6>
                            <h2 class="fw-bold">{{ $BlogsComments }}</h2>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-3">
                        <div class="card stats-card shadow-sm p-3">
                            <h6 class="text-muted">Total Mails</h6>
                            <h2 class="fw-bold">{{ $AllMails }}</h2>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-3">
                        <div class="card stats-card shadow-sm p-3">
                            <h6 class="text-muted">Total Blogs Reactions</h6>
                            <h2 class="fw-bold">{{ $AllReaction }}</h2>
                        </div>
                    </div>

                </div>


            </div>

        </div>
    </div>
@endsection
