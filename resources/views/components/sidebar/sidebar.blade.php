<div class="col-lg-4">
    <!-- Trending Posts -->
    <div class="sidebar-widget">
        <h5><i class="fas fa-fire text-danger"></i> Trending Now</h5>

        @foreach ($blogs as $blog)
            <div class="trending-post">
                <img src="{{ asset('uploads/' . $blog->image) }}" class="trending-img" alt="Trending">
                <div class="trending-content">
                    <a href="{{ route('blog.details', $blog->id) }}"></a>
                    <h6>{{ $blog->title }}</h6>
                    </a>
                    <span><i class="fa-solid fa-eye"></i> <small class="text-muted">{{ $blog->views }} Views</small> · 
                    <span><i class="fa-regular fa-user"></i> <small class="text-muted"> {{ $blog->user->name ?? 'Unknown User' }} </small>
                
                    </div>
            </div>
        @endforeach
    </div>

    <!-- Popular Tags -->
    <div class="sidebar-widget">
        <h5><i class="fas fa-tags"></i> Popular Categories</h5>
        {{-- <form method="get" action="{{ route('category.search') }}">
            <div>
                <span class="tag">Technology</span>
                <span class="tag">Travel</span>
                <span class="tag">Design</span>
                <span class="tag">Business</span>
                <span class="tag">Lifestyle</span>
                <span class="tag">Food & Cooking</span>
                <span class="tag">Health & Wellness</span>
                <span class="tag">Education</span>
                <span class="tag">Entertainment</span>
                <span class="tag">Sports</span>
            </div>
        </form> --}}

        <div class="category-tags">
            @foreach (['Technology', 'Travel', 'Design', 'Business', 'Lifestyle', 'Food & Cooking', 'Health & Wellness', 'Education', 'Entertainment', 'Sports'] as $cat)
                <a href="{{ route('category.search', ['query' => $cat]) }}" class="tag">
                    {{ $cat }}
                </a>
            @endforeach
        </div>


    </div>

</div>
