@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">

            <!-- Sidebar -->
            @include('components.sidebar.adminsidebar')




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
                            <th>Created</th>
                            <th>Updated</th>
                            <th>Show Blog</th>
                            <th>Views</th>
                            <th>Edit</th>
                            <th>Delete</th>
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
                                {{-- <td>{{ Str::limit($blog->description, 50) }}</td> --}}
                                {{-- <td>{!! $blog->description !!}</td> --}}
                                <td> {{ \Illuminate\Support\Str::limit(strip_tags($blog->description), 50) }}</td>
                                <td>{{ $blog->category }}</td>
                                <td>{{ $blog->created_at->format('d M, Y') }}</td>
                                <td>{{ $blog->updated_at->format('d M, Y') }}</td>
                                <td> <a href="{{ route('admin.blog.show', $blog->id) }}" class="btn btn-sm btn-success"
                                        target="_blank">Show</a></td>
                                <td>{{ $blog->views }}</td>
                                <td>
                                    <a href="{{ route('admin.blog.edit', $blog->id) }}"
                                        class="btn btn-sm btn-info">Edit</a>
                                </td>

                                <td>
                                    <form action="{{ route('blog.delete', $blog) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger"
                                            onclick="return confirm('Are you sure you want to delete this blog?')">
                                            Delete
                                        </button>
                                    </form>
                                </td>


                            </tr>
                        @endforeach
                        {{-- Pagination --}}
                        {{-- <div class="col-12 mt-4 d-flex justify-content-center">
                            {{ $blogs->links('pagination::bootstrap-5') }}
                        </div> --}}

                        <div class="mt-3">
                            {{ $blogs->links('pagination::bootstrap-5') }}
                        </div>
                    </tbody>

                </table>
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
