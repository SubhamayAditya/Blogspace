@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <!-- Sidebar -->
            @include('components.sidebar.adminsidebar')

            <!-- Main Section -->
            <div class="col-md-9 col-lg-10 p-4">
                <h2 class="fw-bold">User Management</h2>
                <p class="text-muted">List of all registered users.</p>

                <table class="table table-striped mt-4">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Approved</th>
                            <th width="150">Action</th>
                            <th>Created At</th>
                            <th width="150">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ ucfirst($user->role) }}</td>
                                <td>
                                    @if ($user->is_approved)
                                        <span class="badge bg-success">Yes</span>
                                    @else
                                        <span class="badge bg-danger">No</span>
                                    @endif
                                </td>

                                <td>
                                    {{-- <a href="" class="btn btn-warning btn-sm">Edit</a> --}}
                                    <form action="{{ route('admin.user.status', $user->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        {{-- <button class="btn btn-sm {{ $user->is_approved ? 'btn-warning' : 'btn-success' }}" --}}
                                        <button class="btn btn-sm {{ $user->is_approved ? 'btn-primary' : 'btn-primary' }}"
                                            onclick="return confirm('Change status?')">
                                            {{-- {{ $user->is_approved ? 'Deny' : 'Approve' }} --}}
                                            Click
                                        </button>
                                    </form>
                                </td>
                                <td>{{ $user->created_at->format('d M, Y') }}</td>
                                <td>
                                    {{-- <form action="{{ route('blog.delete', $blog) }}" method="POST"> --}}
                                    <form action="{{ route('admin.user.delete', $user->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this User?')">
                                            Delete
                                        </button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- <button class="btn btn-success" style="background-color: green; color: #fff;">Import all User Data</button> --}}
            </div>

        </div>
    </div>
@endsection


<script>
    document.addEventListener('DOMContentLoaded', function() {
        @if (session('success'))
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2500
            });


            // Swal.fire({
            //     title: "{{ session('success') }}",
            //     icon: "success",
            //     draggable: true
            // });
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
