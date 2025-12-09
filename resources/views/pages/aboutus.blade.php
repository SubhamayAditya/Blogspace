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

        /* Values Section */
        .values-section {
            padding: 80px 0;
            background: var(--light);
        }

        .section-title {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-title h2 {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 15px;
        }

        .section-title p {
            color: #64748b;
            font-size: 1.2rem;
        }

        .value-card {
            background: white;
            border-radius: 20px;
            padding: 40px;
            text-align: center;
            transition: all 0.4s ease;
            height: 100%;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        }

        .value-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .value-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            font-size: 2rem;
            color: white;
            transition: all 0.4s ease;
        }

        .value-card:hover .value-icon {
            transform: rotateY(360deg);
        }

        .value-card h4 {
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 15px;
            font-size: 1.5rem;
        }

        .value-card p {
            color: #64748b;
            line-height: 1.7;
        }

        /* Team Section */
        .team-section {
            padding: 80px 0;
            background: white;
        }

        .team-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.4s ease;
            height: 100%;
        }

        .team-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
        }

        .team-img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            position: relative;
        }

        .team-info {
            padding: 30px;
            text-align: center;
        }

        .team-info h4 {
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 5px;
        }

        .team-role {
            color: var(--primary);
            font-weight: 600;
            margin-bottom: 15px;
        }

        .team-info p {
            color: #64748b;
            line-height: 1.7;
            margin-bottom: 20px;
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

        /* Stats Section */
        .stats-section {
            padding: 80px 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .stat-box {
            text-align: center;
            padding: 30px;
        }

        .stat-number {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 10px;
            display: block;
        }

        .stat-label {
            font-size: 1.2rem;
            opacity: 0.9;
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
    <section class="values-section">
        <div class="container">
            <div class="section-title">
                <h2>Our Core Values</h2>
                <p>The principles that guide everything we do</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h4>Community First</h4>
                        <p>We foster an inclusive environment where every voice matters and every story deserves to be
                            heard.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-lightbulb"></i>
                        </div>
                        <h4>Innovation</h4>
                        <p>We continuously evolve our platform with cutting-edge features to enhance your writing and
                            reading experience.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <h4>Authenticity</h4>
                        <p>We celebrate genuine voices and original content that reflects the true essence of our diverse
                            community.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h4>Trust & Safety</h4>
                        <p>We prioritize creating a safe, respectful space where writers and readers can engage with
                            confidence.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-rocket"></i>
                        </div>
                        <h4>Empowerment</h4>
                        <p>We provide tools and resources that enable everyone to share their knowledge and grow as content
                            creators.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-globe"></i>
                        </div>
                        <h4>Global Reach</h4>
                        <p>We connect writers and readers across borders, cultures, and languages to build a truly global
                            community.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-6">
                    <div class="stat-box">
                        <span class="stat-number" data-target="50000">0</span>
                        <span class="stat-label">Active Writers</span>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-box">
                        <span class="stat-number" data-target="500000">0</span>
                        <span class="stat-label">Blog Posts</span>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-box">
                        <span class="stat-number" data-target="2000000">0</span>
                        <span class="stat-label">Monthly Readers</span>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-box">
                        <span class="stat-number" data-target="150">0</span>
                        <span class="stat-label">Countries</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

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

    <!-- Team Section -->
    <section class="team-section">
        <div class="container">
            <div class="section-title">
                <h2>Meet Our Team</h2>
                <p>The people behind BlogSpace</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="team-card">
                        <img src="https://i.pravatar.cc/400?img=12" alt="Team Member" class="team-img">
                        <div class="team-info">
                            <h4>Sarah Johnson</h4>
                            <p class="team-role">CEO & Co-Founder</p>
                            <p>Visionary leader with 15+ years in digital media and community building.</p>
                            <div class="social-links">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                                <a href="#"><i class="fas fa-envelope"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="team-card">
                        <img src="https://i.pravatar.cc/400?img=13" alt="Team Member" class="team-img">
                        <div class="team-info">
                            <h4>Michael Chen</h4>
                            <p class="team-role">CTO & Co-Founder</p>
                            <p>Tech innovator passionate about building scalable platforms for creators.</p>
                            <div class="social-links">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                                <a href="#"><i class="fab fa-github"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="team-card">
                        <img src="https://i.pravatar.cc/400?img=20" alt="Team Member" class="team-img">
                        <div class="team-info">
                            <h4>Emily Rodriguez</h4>
                            <p class="team-role">Head of Community</p>
                            <p>Community advocate dedicated to fostering meaningful connections.</p>
                            <div class="social-links">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                                <a href="#"><i class="fas fa-envelope"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="team-card">
                        <img src="https://i.pravatar.cc/400?img=33" alt="Team Member" class="team-img">
                        <div class="team-info">
                            <h4>David Kim</h4>
                            <p class="team-role">Lead Product Designer</p>
                            <p>Design expert crafting beautiful and intuitive user experiences.</p>
                            <div class="social-links">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-dribbble"></i></a>
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <h2>Ready to Share Your Story?</h2>
            <p>Join thousands of writers who trust BlogSpace to amplify their voice</p>
            <button class="btn btn-white" onclick="location.href='{{ route('blog.write') }}'">
                <i class="fas fa-pen"></i> Start Writing Today
            </button>
        </div>
    </section>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script>
        // Animated Counter
        function animateCounter(element) {
            const target = parseInt(element.getAttribute('data-target'));
            const duration = 2000;
            const step = target / (duration / 16);
            let current = 0;

            const timer = setInterval(() => {
                current += step;
                if (current >= target) {
                    element.textContent = target.toLocaleString();
                    clearInterval(timer);
                } else {
                    element.textContent = Math.floor(current).toLocaleString();
                }
            }, 16);
        }

        // Intersection Observer for counter animation
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counters = entry.target.querySelectorAll('.stat-number');
                    counters.forEach(counter => {
                        if (counter.textContent === '0') {
                            animateCounter(counter);
                        }
                    });
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.5
        });

        const statsSection = document.querySelector('.stats-section');
        if (statsSection) {
            observer.observe(statsSection);
        }
    </script>
@endsection
