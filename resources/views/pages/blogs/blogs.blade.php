@extends('layouts.master')

@section('content')

    <style>
        /* Hero Section */
        .about-hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 90px 0;
            color: #fff;
            position: relative;
            overflow: hidden;
            margin-bottom: 0; /* Remove bottom margin to prevent gaps */
        }

        .about-hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><circle cx="50" cy="50" r="2" fill="rgba(255,255,255,0.15)"/></svg>');
            animation: float 25s linear infinite;
        }

        @keyframes float {
            from { transform: translateY(0); }
            to { transform: translateY(-120px); }
        }

        .about-hero h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 15px;
            position: relative;
            z-index: 1;
        }

        .about-hero p {
            font-size: 1.15rem;
            max-width: 720px;
            margin: 0 auto;
            opacity: 0.95;
            position: relative;
            z-index: 1;
        }

        /* Main Content Layout */
        .main-content-wrapper {
            padding: 70px 0;
            background: #f8f9fa;
            min-height: 500px;
        }

        /* Sidebar Styling */
        .sidebar-container {
            position: sticky;
            top: 30px; /* Distance from top when sticky */
            height: fit-content;
        }

        /* Ensure proper spacing */
        .container {
            max-width: 1320px;
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            .main-content-wrapper {
                padding: 50px 0;
            }
            
            .sidebar-container {
                position: static;
                margin-top: 40px;
            }
        }

        @media (max-width: 768px) {
            .about-hero {
                padding: 60px 0;
            }
            
            .about-hero h1 {
                font-size: 2.5rem;
            }
            
            .about-hero p {
                font-size: 1rem;
                padding: 0 20px;
            }
        }

        @media (max-width: 576px) {
            .about-hero {
                padding: 50px 0;
            }
            
            .about-hero h1 {
                font-size: 2rem;
            }
            
            .main-content-wrapper {
                padding: 40px 0;
            }
        }
    </style>

    <!-- Hero Section -->
    <section class="about-hero">
        <div class="container text-center">
            <h1>Blogs</h1>
            <p>
                Empowering writers and readers to share stories, ideas,
                and knowledge that inspire communities worldwide.
            </p>
        </div>
    </section>

    <!-- Main Content Area -->
   <!-- Content Section -->
    <section class="content-section">
        <div class="container">
            <div class="row">

                <!-- Main Content -->
                @include('components.cards.blogcard')

                <!-- Sidebar -->
                @include('components.sidebar.sidebar')

            </div>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>

@endsection