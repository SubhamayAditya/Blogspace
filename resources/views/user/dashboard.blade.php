@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <!-- Sidebar -->
            @include('user.usersidebar')

            <!-- Main Section -->
            <div class="col-md-9 col-lg-10 p-4">
                <h2 class="fw-bold">Welcome, {{ Auth::user()->name }} 👋</h2>
                <p class="text-muted">Manage your application data from here.</p>

                <div class="row mt-4">
                    {{-- <div class="col-lg-4">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5>Total Users</h5>
                                <h3>25</h3>
                            </div>
                        </div>
                    </div> --}}

                    {{-- <div class="col-lg-4">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5>Pending Approvals</h5>
                                <h3>8</h3>
                            </div>
                        </div>
                    </div> --}}

                    <div class="col-lg-4">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5>Total Blogs</h5>
                                <h3>42</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <footer class="mt-5">
                    <p class="text-center text-white small">© 2025 Admin Dashboard</p>
                </footer>
            </div>

        </div>
    </div>
@endsection
