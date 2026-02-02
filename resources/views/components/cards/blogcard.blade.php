    <div class="col-lg-8">
        <h2 class="mb-4 fw-bold">Latest Articles</h2>

        <div class="row">
            <!-- Blog Card  -->
            @foreach ($blogs as $blog)
                <div class="col-md-6">

                    <div class="blog-card">
                        <img src="{{ asset('uploads/' . $blog->image) }}" alt="Blog">

                        <div class="blog-card-body">
                            <span class="blog-category">{{ $blog->category }}</span>
                            <span><i class="fa-solid fa-eye"></i> <small class="text-muted">{{ $blog->views }}
                                    Views</small> . <i class="fa-regular fa-user"></i>
                                {{ $blog->user->name ?? 'Unknown User' }} <small class="text-muted"></small>
<<<<<<< HEAD
                                <a href="{{ route('blog.details', $blog->id) }}"  style="text-decoration: none">
=======
                                <a href="{{ route('blog.details', $blog->id) }}">
>>>>>>> 0bd373c53cca39c0ea4a4d40ddb035e1b6e7ad00
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

                </div>
            @endforeach
            {{-- {{ $blogs->links() }} --}}
            {{-- Pagination --}}
            <div class="col-12 mt-4 d-flex justify-content-center">
                {{ $blogs->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
