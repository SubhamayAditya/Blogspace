<section class="hero-section">
    <div class="container">
        <h1>Welcome to BlogSpace</h1>
        <p>Discover stories, thinking, and expertise from writers on any topic</p>

        <!-- Search Bar -->
        <div class="search-bar">

            <form action="{{ route('blog.search') }}" method="GET" class="search-bar d-flex">
                <input type="text" name="query" class="form-control"
                    placeholder="Search for articles, authors, or topics..." value="{{ request()->query('query') }}">

                <button class="btn btn-primary ms-2">
                    <i class="fas fa-search"></i>
                </button>
            </form>

        </div>
    </div>
</section>
