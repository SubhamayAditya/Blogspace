@extends('layouts.master')

@section('content')

<style>
    .card {
        border-radius: 12px;
        box-shadow: 0 6px 18px rgba(0,0,0,0.06);
        border: 1px solid #e5e7eb;
    }

    .page-title {
        font-weight: 700;
        margin-bottom: 20px;
    }
</style>

<div class="container-fluid">
    <div class="row">

        <!-- Sidebar -->
        @include('components.sidebar.adminsidebar')

        <!-- Main Content -->
        <div class="col-md-9 col-lg-10 p-4">

            <h4 class="page-title">Manage Blog Categories</h4>

            {{-- Add Category --}}
            <div class="card mb-4">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.categories.store') }}">
                        @csrf
                        <div class="row g-2 align-items-center">
                            <div class="col-md-8">
                                <input type="text"
                                       name="name"
                                       class="form-control"
                                       placeholder="Enter category name"
                                       required>
                            </div>
                            <div class="col-md-4 text-end">
                                <button class="btn btn-primary px-4">
                                    <i class="fas fa-plus"></i> Add Category
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Category List --}}
            <div class="card">
                <div class="card-body">

                    <h5 class="fw-bold mb-3">Existing Categories</h5>

                    <div class="table-responsive">
                        <table class="table table-bordered align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Category Name</th>
                                    <th>Used In Blogs</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $category)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            {{ \App\Models\Blog::where('category', $category->name)->count() }}
                                        </td>
                                        <td class="text-center">
                                            <form method="POST"
                                                  action="{{ route('admin.categories.delete', $category->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Delete this category?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted">
                                            No categories found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

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
