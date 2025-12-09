@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <!-- Sidebar -->
            @include('admin.adminsidebar')
            
       


        <!-- Main Section -->
        <div class="col-md-9 col-lg-10 p-4">
            <h2 class="fw-bold">{{ Auth::user()->name }} Blogs</h2>
            <p class="text-muted">List of all Blogs.</p>

            <table class="table table-striped mt-4">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Views</th>
                        <th width="150">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blogs as $blog)
                        <tr>
                            <td>{{ $blog->id }}</td>
                            <td>{{ $blog->title }}</td>
                            <td>
                                <img src="{{ asset('uploads/' . $blog->image) }}" width="70">
                            </td>
                            <td>{{ Str::limit($blog->description, 50) }}</td>
                            <td>{{ $blog->category }}</td>
                            <td>{{ $blog->created_at->format('d M, Y') }}</td>
                            <td>{{ $blog->updated_at->format('d M, Y') }}</td>
                            <td>{{ $blog->views }}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-info">Edit</a>
                                <a href="#" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Delete this blog?')">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

    </div>
</div>
@endsection
