@extends('layouts.master')

@section('content')
    <div class="container py-5">

        <!-- Search Bar -->
        <form action="{{ route('blog.search') }}" method="GET" class="search-bar d-flex mb-4">
            <input type="text" name="query" class="form-control" placeholder="Search for articles, authors, or topics..."
                value="{{ request()->query('query') }}">
            <button class="btn btn-primary ms-2">
                <i class="fas fa-search"></i>
            </button>
        </form>

        <!-- Page Title -->
        <h2 class="mb-4 fw-bold">Searching Results for :
            <span style="color: #000000">{{ request()->query('query') }}</span>
        </h2>

        <div class="row">

            @if ($blogs->count() > 0)
                @foreach ($blogs as $blog)
                    <div class="col-md-6 mb-4">
                        {{-- <a href="{{ route('blog.details', $blog->id) }}"> --}}
                            <div class="card blog-card">
                                <img src="{{ asset('uploads/' . $blog->image) }}" class="card-img-top" alt="Blog">

                                <div class="blog-card-body">
                                    <span class="blog-category">{{ $blog->category }}</span>
                                    <span><i class="fa-solid fa-eye"></i> <small class="text-muted">{{ $blog->views }}
                                            Views</small> . <i class="fa-regular fa-user"></i>
                                        {{ $blog->user->name ?? 'Unknown User' }} <small class="text-muted"></small>
                                        <a href="{{ route('blog.details', $blog->id) }}">
                                            <h3 class="blog-title">{{ $blog->title }}</h3>
                                        </a>

                                        {{-- <p class="text-muted">{!! $blog->description !!}</p> --}}
                                        <p class="text-muted">
                                            {!! Str::limit(strip_tags($blog->description, '<p><br><strong><em>'), 150) !!}
                                        </p>
                                        <a href="{{ route('blog.details', $blog->id) }}">
                                            <button class="nav-item btn btn-primary ms-3 text-white">Read More</button>
                                        </a>
                                </div>
                            </div>
                        {{-- </a> --}}
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
