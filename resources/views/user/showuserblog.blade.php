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
                    <div class="blog-meta mb-4 d-flex align-items-center gap-3">

                        <!-- Author Image -->
                        {{-- <img src="https://via.placeholder.com/50" class="author-img rounded-circle" alt="author"> --}}

                        <!-- Author Name -->
                        <span>
                            <i class="fa-solid fa-user"></i> 
                            {{ $blog->user->name ?? 'Unknown User' }}
                            <small class="text-muted">({{ ucfirst($blog->user->role ?? '') }})</small>
                        </span>

                        <!-- Views -->
                        <span>
                            <i class="fa-solid fa-eye"></i> 
                            <small class="text-muted">{{ $blog->views }} Views</small>
                        </span>

                        <!-- Date -->
                        <span>
                            <i class="fa-regular fa-calendar"></i> 
                            {{ $blog->created_at->format('d M, Y') }}
                        </span>
                        
                    </div>

                    <!-- Blog Content -->
                    <div class="blog-content">
                        <p style="line-height: 1.9; font-size:1.15rem; color:#334155;">
                            {{-- {!! nl2br(e($blog->description)) !!} --}}
                             {!! $blog->description !!}
                        </p>
                    </div>

                    <hr class="my-5">

                {{-- COMMENT FORM --}}
                <div class="mb-5">
                    <h4 class="fw-semibold mb-3">Leave a Comment</h4>

                    <form method="POST" action="{{ route('comment.store', $blog->id) }}">
                        @csrf
                        <textarea class="form-control mb-3" name="comment"
                            rows="4" placeholder="Write your comment..." required></textarea>

                        <button class="btn btn-primary px-4">
                            <i class="fa-regular fa-paper-plane"></i> Post Comment
                        </button>
                    </form>

                    @if (session('success'))
                        <div class="alert alert-success mt-3">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>

                {{-- COMMENTS --}}
                <div>
                    <h4 class="fw-semibold mb-4">
                        Comments ({{ $blog->comments->count() }})
                    </h4>

                    @forelse ($blog->comments as $comment)
                        <div class="border rounded p-3 mb-3">

                            <div class="d-flex justify-content-between">
                                <strong>{{ $comment->name }}</strong>
                                <small class="text-muted">
                                    {{ $comment->created_at->diffForHumans() }}
                                </small>
                            </div>

                            <p class="mt-2 mb-3">{{ $comment->comment }}</p>

                            {{-- REPLY FORM --}}
                            <form method="POST"
                                action="{{ route('comment.reply', $comment->id) }}"
                                class="mb-3">
                                @csrf
                                <textarea class="form-control mb-2"
                                    name="comment" rows="2"
                                    placeholder="Reply..." required></textarea>
                                <button class="btn btn-sm btn-outline-primary">
                                    Reply
                                </button>
                            </form>

                            {{-- REPLIES --}}
                            @foreach ($comment->replies as $reply)
                                <div class="ms-4 ps-3 border-start">
                                    <div class="d-flex justify-content-between">
                                        <strong>{{ $reply->name }}</strong>
                                        <small class="text-muted">
                                            {{ $reply->created_at->diffForHumans() }}
                                        </small>
                                    </div>
                                    <p class="mb-1">{{ $reply->comment }}</p>
                                </div>
                            @endforeach

                        </div>
                    @empty
                        <p class="text-muted">No comments yet.</p>
                    @endforelse
                </div>

                </div>

            </div>
        </div>
    </div>
@endsection
