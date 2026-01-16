@extends('layouts.master')


@section('content')
    <style>
        :root {
            --primary: #6366f1;
            --secondary: #8b5cf6;
            --dark: #1e293b;
            --light: #f8fafc;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: var(--light);
        }

        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Hero Section */
        .about-hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 100px 0 80px;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .about-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><circle cx="50" cy="50" r="2" fill="rgba(255,255,255,0.1)"/></svg>');
            animation: float 20s linear infinite;
        }

        @keyframes float {
            from {
                transform: translateY(0);
            }

            to {
                transform: translateY(-100px);
            }
        }

        .about-hero h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
        }

        .about-hero p {
            font-size: 1.3rem;
            opacity: 0.95;
            max-width: 700px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        /* Mission Section */
        .mission-section {
            padding: 80px 0;
            background: white;
        }

        .mission-card {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border-radius: 20px;
            padding: 50px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            position: relative;
            overflow: hidden;
        }

        .mission-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(99, 102, 241, 0.1) 0%, transparent 70%);
            animation: pulse 3s ease-in-out infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.1);
            }
        }

        .mission-card h2 {
            color: var(--dark);
            font-weight: 700;
            margin-bottom: 25px;
            position: relative;
            z-index: 1;
        }

        .mission-card p {
            color: #64748b;
            font-size: 1.15rem;
            line-height: 1.8;
            position: relative;
            z-index: 1;
        }




        .social-links {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .social-links a {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(99, 102, 241, 0.4);
        }



        /* Story Section */
        .story-section {
            padding: 80px 0;
            background: var(--light);
        }

        .story-content {
            background: white;
            border-radius: 20px;
            padding: 50px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        .story-content h3 {
            color: var(--dark);
            font-weight: 700;
            margin-bottom: 20px;
            font-size: 2rem;
        }

        .story-content p {
            color: #64748b;
            font-size: 1.1rem;
            line-height: 1.9;
            margin-bottom: 20px;
        }

        .story-image {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .story-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* CTA Section */
        .cta-section {
            padding: 100px 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-align: center;
        }

        .cta-section h2 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 25px;
        }

        .cta-section p {
            font-size: 1.3rem;
            margin-bottom: 40px;
            opacity: 0.95;
        }

        .btn-white {
            background: white;
            color: var(--primary);
            padding: 15px 40px;
            border-radius: 30px;
            font-weight: 700;
            font-size: 1.1rem;
            border: none;
            transition: all 0.3s ease;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
        }

        .btn-white:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            color: var(--primary);
        }

        /* Footer */
        footer {
            background: var(--dark);
            color: white;
            padding: 40px 0 20px;
        }

        .social-icons a {
            color: white;
            font-size: 1.5rem;
            margin: 0 10px;
            transition: all 0.3s ease;
        }

        .social-icons a:hover {
            color: var(--primary);
            transform: translateY(-3px);
        }

        @media (max-width: 768px) {
            .about-hero h1 {
                font-size: 2.5rem;
            }

            .about-hero p {
                font-size: 1.1rem;
            }

            .mission-card {
                padding: 30px;
            }

            .stat-number {
                font-size: 2.5rem;
            }

            .story-content {
                padding: 30px;
            }

            .cta-section h2 {
                font-size: 2rem;
            }
        }
    </style>


    <!-- Hero Section -->
    <section class="about-hero">
        <div class="container text-center">
            <h1>About BlogSpace</h1>
            <p>Empowering writers and readers to share stories, ideas, and knowledge that inspire and connect communities
                worldwide</p>
        </div>
    </section>

    <!-- Mission Section -->
    <section class="mission-section">
        <div class="container">
            <div class="mission-card">
                <h2><i class="fas fa-bullseye"></i> Our Mission</h2>
                <p>At BlogSpace, we believe everyone has a story worth sharing. Our mission is to provide a platform where
                    writers can express their thoughts freely, and readers can discover content that inspires, educates, and
                    entertains. We're building a community where diverse voices come together to create meaningful
                    conversations and lasting connections.</p>
                <p class="mb-0">Whether you're a seasoned blogger or just starting your writing journey, BlogSpace offers
                    the tools, support, and audience you need to make your voice heard in the digital world.</p>
            </div>
        </div>
    </section>

    <!-- Values Section -->
    @include('components.sections.values')

    <!-- Stats Section -->
    @include('components.sections.stats')

    <!-- Story Section -->
    <section class="story-section">
        <div class="container">
            <div class="section-title">
                <h2>Our Story</h2>
                <p>How BlogSpace came to be</p>
            </div>
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <div class="story-content">
                        <h3>From Idea to Platform</h3>
                        <p>BlogSpace was founded in 2020 by a group of passionate writers and technologists who believed
                            that everyone deserves a platform to share their voice. What started as a small project has
                            grown into a thriving community of storytellers, thought leaders, and curious minds.</p>
                        <p>We've witnessed countless success stories: aspiring writers finding their audience, experts
                            sharing valuable knowledge, and readers discovering content that changed their perspectives.
                            These stories fuel our passion and drive us to continuously improve our platform.</p>
                        <p class="mb-0">Today, BlogSpace stands as a testament to the power of community, creativity, and
                            the written word. We're proud to be the home where millions of stories are shared, read, and
                            celebrated every month.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="story-image">
                        <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=800"
                            alt="Team collaboration">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    @auth
        @if (Auth::user()->role === 'admin' || Auth::user()->role === 'user')
            <section class="cta-section">
                <div class="container">
                    <h2>Ready to Share Your Story?</h2>
                    <p>Join thousands of writers who trust BlogSpace to amplify their voice</p>

                    <button class="btn btn-white" onclick="location.href='{{ route('blog.write') }}'">
                        <i class="fas fa-pen"></i> Start Writing Today
                    </button>
                </div>
            </section>
        @endif
    @endauth

    @guest
        <section class="cta-section">

            <div class="container">
      <h2>Ready to Share Your Story?</h2>
                    <p>Join thousands of writers who trust BlogSpace to amplify their voice</p>
                <button class="btn btn-primary btn-lg shadow rounded-pill px-5">
                    <a class="text-white" href="{{ route('login') }}">
                        Login
                    </a>
                </button>
            </div>
        </section>
    @endguest
    <!-- Team Section -->
    @include('components.sections.ourteam')





    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
@endsection
