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
                            <h6 class="text-muted"> <i class="bi bi-people fs-1 text-primary"></i> Total Users</h6>
                            <h2 class="fw-bold">{{ $totalUsers }}</h2>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-3">
                        <div class="card stats-card shadow-sm p-3">
                            <h6 class="text-muted"><i class="bi bi-person-check fs-1 text-warning"></i> Pending Approvals
                            </h6>
                            <h2 class="fw-bold">{{ $pendingUsers }}</h2>
                        </div>

                    </div>

                    <div class="col-lg-4 mb-3">
                        <div class="card stats-card shadow-sm p-3">
                            <h6 class="text-muted"><i class="bi bi-journal-text fs-1 text-success"></i>
                                Total Blogs</h6>
                            <h2 class="fw-bold">{{ $totalBlogs }}</h2>
                        </div>
                    </div>


                    <div class="col-lg-4 mb-3">
                        <div class="card stats-card shadow-sm p-3">
                            <h6 class="text-muted"><i class="bi bi-eye fs-1 text-info"></i>
                                Total Blogs Views</h6>
                            <h2 class="fw-bold">{{ $adminBlogsViews }}</h2>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-3">
                        <div class="card stats-card shadow-sm p-3">
                            <h6 class="text-muted"><i class="bi bi-chat-dots fs-1 text-secondary"></i>
                                Total Comments</h6>
                            <h2 class="fw-bold">{{ $BlogsComments }}</h2>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-3">
                        <div class="card stats-card shadow-sm p-3">
                            <h6 class="text-muted"><i class="bi bi-envelope-paper fs-1 text-danger"></i>
                                Total Mails</h6>
                            <h2 class="fw-bold">{{ $AllMails }}</h2>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-3">
                        <div class="card stats-card shadow-sm p-3">
                            <h6 class="text-muted"> <i class="bi bi-hand-thumbs-up fs-1 text-success"></i>
                                Total Blogs Reactions</h6>
                            <h2 class="fw-bold">{{ $AllReaction }}</h2>
                        </div>
                    </div>

                </div>


            </div>

        </div>
    </div>
@endsection

<style>
    .stats-card i {
        background: rgba(0, 123, 255, 0.1);
        padding: 15px;
        border-radius: 12px;
    }
</style>
