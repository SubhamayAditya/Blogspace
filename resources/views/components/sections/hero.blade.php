         <style>
            .hero-section {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                padding: 100px 0 80px;
                color: white;
                position: relative;
                overflow: hidden;
                text-align: center;
            }

            /* Floating dots overlay */
            .hero-section::before {
                content: '';
                position: absolute;
                inset: 0;
                background: url("data:image/svg+xml,%3Csvg width='100' height='100' xmlns='http://www.w3.org/2000/svg'%3E%3Ccircle cx='50' cy='50' r='2' fill='rgba(255,255,255,0.15)'/%3E%3C/svg%3E");
                animation: float 20s linear infinite;
            }

            /* Floating animation */
            @keyframes float {
                from {
                    transform: translateY(0);
                }

                to {
                    transform: translateY(-100px);
                }
            }

            .hero-content {
                position: relative;
                z-index: 1;
            }

            .hero-section h1 {
                font-size: 3.5rem;
                font-weight: 700;
                margin-bottom: 20px;
            }

            .hero-section p {
                font-size: 1.3rem;
                opacity: 0.95;
                max-width: 700px;
                margin: 0 auto;
            }

            /* Search bar tweak */
            .search-bar input {
                border-radius: 30px;
                padding: 12px 20px;
            }

            .search-bar button {
                border-radius: 30px;
            }
        </style>
        <section class="hero-section">
            <div class="container hero-content">
                <h1>Welcome to BlogSpace</h1>
                <p>Discover stories, thinking, and expertise from writers on any topic</p>

                <!-- Search Bar -->
                <form action="{{ route('blog.search') }}" method="GET"
                    class="search-bar d-flex justify-content-center mt-4">
                    <input type="text" name="query" class="form-control w-50"
                        placeholder="Search for articles, authors, or topics..."
                        value="{{ request()->query('query') }}">

                    <button class="btn btn-primary ms-2">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </section> 

