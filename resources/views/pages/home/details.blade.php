@extends('layouts.master')

@section('content')

    {{-- HERO --}}
    <section class="bg-light py-5 border-bottom">
        <div class="container">
            <h1 class="fw-bold mb-2">{{ $blog->title }}</h1>
            <p class="text-muted mb-0">
                <i class="fa-regular fa-user"></i> {{ $blog->user->name ?? 'Unknown User' }} <small
                    class="text-muted">({{ ucfirst($blog->user->role ?? '') }})</small>·
                <i class="fa-solid fa-folder-open"></i> {{ ucfirst($blog->category) }} ·
                <i class="fa-regular fa-calendar"></i> {{ $blog->created_at->format('d M, Y') }} ·
                <i class="fa-solid fa-eye"></i> {{ $blog->views }} Views
            </p>
        </div>
    </section>

    {{-- CONTENT --}}   
    <section class="py-5" style="background: #e2e2e2">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-lg-8">

                    {{-- IMAGE --}}
                    <div class="mb-4">
                        <img src="{{ asset('uploads/' . $blog->image) }}" class="img-fluid rounded shadow-sm w-100"
                            alt="Blog Image">
                    </div>

                    {{-- AUTHOR META --}}
                    <div class="d-flex align-items-center mb-4">
                        {{-- <img src="https://via.placeholder.com/45"
                        class="rounded-circle me-3"
                        alt="Author"> --}}
                        <div>
                            {{-- <strong> {{ $blog->user->name ?? 'Unknown User' }}</strong> --}}
                            {{-- <small class="text-muted">({{ ucfirst($blog->user->role ?? '') }})</small> --}}
                            {{-- <div class="text-muted small">
                                {{ $blog->created_at->diffForHumans() }}
                            </div> --}}
                        </div>
                    </div>

                    {{-- CONTENT --}}
                    <article class="mb-5 border rounded p-3 mb-3"
                        style="line-height:1.9;font-size:1.15rem;color:#000000; background-color: #ffffff; padding: 10px;">
                        {!! $blog->description !!}
                    </article>

                    <hr class="my-5">

                    {{-- COMMENT FORM --}}
                    <div class="mb-5">
                        <h4 class="fw-semibold mb-3">Leave a Comment</h4>

                        <form method="POST" action="{{ route('comment.store', $blog->id) }}">
                            @csrf
                            <textarea class="form-control mb-3" name="comment" rows="4" placeholder="Write your comment..." required></textarea>

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
                                <form method="POST" action="{{ route('comment.reply', $comment->id) }}" class="mb-3">
                                    @csrf
                                    <textarea class="form-control mb-2" name="comment" rows="2" placeholder="Reply..." required></textarea>
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
    </section>

@endsection
