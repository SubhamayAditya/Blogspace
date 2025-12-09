@extends('layouts.master')

@section('content')
    <section class="hero-section" style="padding:60px 0;">
        <div class="container">
            <h1 class="mt-3">{{ $blog->title }}</h1>
            <p class="opacity-75"><i class="fa-solid fa-folder-open"></i> {{ ucfirst($blog->category) }}</p>
        </div>
    </section>

    <div class="content-section">
        <div class="container">
            <div class="row">

                <!-- Main Content -->
                <div class="col-lg-8 mb-4">

                    <!-- Cover Image -->
                    <div class="mb-4">
                        <img src="{{ asset('uploads/' . $blog->image) }}" class="img-fluid rounded shadow" alt="Blog Image">
                    </div>

                    <!-- Meta Info -->
                    <div class="blog-meta mb-4">
                        <img src="https://via.placeholder.com/50" class="author-img" alt="author">
                        <span><i class="fa-solid fa-user"></i> Admin</span>
                        <span><i class="fa-solid fa-eye"></i> <small class="text-muted">{{ $blog->views }} Views</small>
                        <span><i class="fa-regular fa-calendar"></i> {{ $blog->created_at->format('d M, Y') }}</span>
                    </div>

                    <!-- Blog Content -->
                    <div class="blog-content">
                        <p style="line-height: 1.9; font-size:1.15rem; color:#334155;">
                            {!! nl2br(e($blog->description)) !!}
                        </p>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
