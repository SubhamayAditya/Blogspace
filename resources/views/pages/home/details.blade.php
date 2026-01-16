@extends('layouts.master')

@section('content')

    <style>
        .like-dislike {
            border: 1px solid #e5e7eb;
            border-radius: 30px;
            overflow: hidden;
            width: fit-content;
        }

        .like-dislike button {
            border: none;
            background: #fff;
            padding: 8px 18px;
            font-size: 14px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: 0.25s ease;
        }

        /* Divider */
        .like-dislike .divider {
            width: 1px;
            background: #e5e7eb;
        }

        /* Like */
        .like-dislike .like:hover {
            background: #ecfdf5;
            color: #059669;
        }

        /* Dislike */
        .like-dislike .dislike:hover {
            background: #fef2f2;
            color: #dc2626;
        }

        /* Active states */
        .like-dislike .like.active {
            background: #10b981;
            color: #fff;
        }

        .like-dislike .dislike.active {
            background: #ef4444;
            color: #fff;
        }

        .social-share .share-btn {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            cursor: pointer;
            transition: transform 0.2s ease, opacity 0.2s ease;
            font-size: 15px;
        }

        .social-share .share-btn:hover {
            transform: translateY(-2px);
            opacity: 0.9;
        }

        .share-btn.whatsapp {
            background: #25D366;
        }

        .share-btn.facebook {
            background: #1877F2;
        }

        .share-btn.twitter {
            background: #000000;
        }

        .share-btn.linkedin {
            background: #0A66C2;
        }

        .share-btn.copy {
            background: #6B7280;
        }
    </style>
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

                    {{-- Like & Dislike --}}
                    <div class="like-dislike d-flex align-items-center">
                        <button id="like-btn-{{ $blog->id }}" onclick="reactBlog({{ $blog->id }}, 'like')">
                            👍 <span id="like-count-{{ $blog->id }}">{{ $blog->likes()->count() }}</span>
                        </button>

                        <button id="dislike-btn-{{ $blog->id }}" onclick="reactBlog({{ $blog->id }}, 'dislike')">
                            👎 <span id="dislike-count-{{ $blog->id }}">{{ $blog->dislikes()->count() }}</span>
                        </button>
                    </div>

                    {{-- Social Share --}}
                    <div class="social-share mt-3 d-flex align-items-center gap-2">
                        <span class="text-muted fw-semibold">Share:</span>

                        <button class="share-btn whatsapp" onclick="shareWhatsApp()">
                            <i class="fa-brands fa-whatsapp"></i>
                        </button>

                        <button class="share-btn facebook" onclick="shareFacebook()">
                            <i class="fa-brands fa-facebook-f"></i>
                        </button>

                        <button class="share-btn twitter" onclick="shareTwitter()">
                            <i class="fa-brands fa-x-twitter"></i>
                        </button>

                        <button class="share-btn linkedin" onclick="shareLinkedIn()">
                            <i class="fa-brands fa-linkedin-in"></i>
                        </button>

                        <button class="share-btn copy" onclick="copyLink()">
                            <i class="fa-regular fa-copy"></i>
                        </button>
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

    <script>
        function reactBlog(blogId, type) {
            let url = type === 'like' ?
                `/blog/${blogId}/like` :
                `/blog/${blogId}/dislike`;

            fetch(url, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    }
                })
                .then(response => {

                    if (response.status === 401) {
                        // alert('You must log in first');
                        Swal.fire({
                            icon: "info",
                            text: "You must log in first for this action!",
                        });
                        throw new Error('Unauthorized');
                    }

                    return response.json();
                })
                .then(data => {
                    // Update counts
                    document.getElementById(`like-count-${blogId}`).innerText = data.likes;
                    document.getElementById(`dislike-count-${blogId}`).innerText = data.dislikes;

                    // Update active states
                    document.getElementById(`like-btn-${blogId}`)
                        .classList.toggle('active', data.userReaction === 'like');

                    document.getElementById(`dislike-btn-${blogId}`)
                        .classList.toggle('active', data.userReaction === 'dislike');
                })
                .catch(error => {
                    console.error(error);
                });
        }
    </script>


    <script>
        const blogUrl = "{{ url()->current() }}";
        const blogTitle = "{{ $blog->title }}";

        function shareWhatsApp() {
            window.open(
                `https://wa.me/?text=${encodeURIComponent(blogTitle + ' ' + blogUrl)}`,
                '_blank'
            );
        }

        function shareFacebook() {
            window.open(
                `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(blogUrl)}`,
                '_blank'
            );
        }

        function shareTwitter() {
            window.open(
                `https://twitter.com/intent/tweet?text=${encodeURIComponent(blogTitle)}&url=${encodeURIComponent(blogUrl)}`,
                '_blank'
            );
        }

        function shareLinkedIn() {
            window.open(
                `https://www.linkedin.com/sharing/share-offsite/?url=${encodeURIComponent(blogUrl)}`,
                '_blank'
            );
        }

        function copyLink() {
            navigator.clipboard.writeText(blogUrl).then(() => {
                Swal.fire({
                    icon: "success",
                    text: "Link copied to clipboard!",
                    timer: 1500,
                    showConfirmButton: false
                });
            });
        }
    </script>