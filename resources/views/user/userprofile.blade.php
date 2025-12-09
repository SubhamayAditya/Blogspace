@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <!-- Sidebar -->
            @include('user.usersidebar')




            <!-- Main Section -->
            <div class="col-md-9 col-lg-10 p-4">
                <h2 class="fw-bold">{{ Auth::user()->name }} Profile</h2>
                {{-- <p class="text-muted">List of all Blogs.</p> --}}

                <table class="table table-striped mt-4">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Status</th>
                            <th width="150">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                  
                            <tr>
                                <td>{{ Auth::user()->id }}</td>
                                <td>{{ Auth::user()->name }}</td>
                                <td>{{ Auth::user()->email }}</td>
                                <td>{{ Auth::user()->role }}</td>
                                <td>{{ Auth::user()->created_at->format('d M, Y') }}</td>
                                <td>{{ Auth::user()->created_at->format('d M, Y') }}</td>
                                <td>
                                    @if (Auth::user()->is_approved)
                                        <span class="badge bg-success">Approved</span>
                                    @else
                                        <span class="badge bg-warning text-dark">Pending Approval</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-info">Edit Profile</a>
                                </td>
                            </tr>
                     
                    </tbody>

                </table>
            </div>

        </div>
    </div>
@endsection
