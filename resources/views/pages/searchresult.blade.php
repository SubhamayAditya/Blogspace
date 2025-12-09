@extends('layouts.master')

@section('content')
<div class="container py-5">

    <!-- Search Bar -->
    <form action="{{ route('blog.search') }}" method="GET" class="search-bar d-flex mb-4">
        <input type="text"
               name="query"
               class="form-control"
               placeholder="Search for articles, authors, or topics..."
               value="{{ request()->query('query') }}">
        <button class="btn btn-primary ms-2">
            <i class="fas fa-search"></i>
        </button>
    </form>

    <!-- Page Title -->
    <h2 class="mb-4 fw-bold">Latest Articles</h2>

    <div class="row">

        @if($blogs->count() > 0)
            @foreach ($blogs as $blog)
                <div class="col-md-6 mb-4">
                    <a href="{{ route('blog.details', $blog->id) }}">
                        <div class="card blog-card">
                            <img src="{{ asset('uploads/' . $blog->image) }}" class="card-img-top" alt="Blog">

                            <div class="card-body">
                                <span class="badge bg-primary mb-2">{{ $blog->category }}</span>
                                <h5 class="card-title">{{ $blog->title }}</h5>
                                <p class="card-text text-muted">
                                    {{ Str::limit($blog->description, 100) }}
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        @else
            <div class="col-12">
                <p class="text-white text-center">No blogs found!!!!</p>
            </div>
        @endif

    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $blogs->links('pagination::bootstrap-5') }}
    </div>

</div>
@endsection
