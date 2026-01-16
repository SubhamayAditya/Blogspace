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
        .contact-hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 100px 0 80px;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .contact-hero::before {
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

        .contact-hero h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
        }

        .contact-hero p {
            font-size: 1.3rem;
            opacity: 0.95;
            max-width: 700px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        /* Main Contact Section */
        .contact-section {
            padding: 80px 0;
            margin-top: -50px;
            position: relative;
            z-index: 2;
        }

        .contact-container {
            background: white;
            border-radius: 25px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            overflow: hidden;
        }

        .contact-info-side {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            padding: 60px 40px;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .contact-info-side::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            animation: pulse 4s ease-in-out infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
                opacity: 1;
            }

            50% {
                transform: scale(1.1);
                opacity: 0.8;
            }
        }

        .contact-info-side h3 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
        }

        .contact-info-side p {
            opacity: 0.95;
            margin-bottom: 40px;
            font-size: 1.1rem;
            position: relative;
            z-index: 1;
        }

        .contact-item {
            display: flex;
            align-items: flex-start;
            gap: 20px;
            margin-bottom: 30px;
            position: relative;
            z-index: 1;
        }

        .contact-icon {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            flex-shrink: 0;
        }

        .contact-item-content h5 {
            margin-bottom: 8px;
            font-weight: 700;
        }

        .contact-item-content p {
            margin: 0;
            opacity: 0.9;
        }

        .social-links-contact {
            display: flex;
            gap: 15px;
            margin-top: 40px;
            position: relative;
            z-index: 1;
        }

        .social-links-contact a {
            width: 45px;
            height: 45px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }

        .social-links-contact a:hover {
            background: white;
            color: var(--primary);
            transform: translateY(-5px);
        }

        .contact-form-side {
            padding: 60px 50px;
        }

        .contact-form-side h3 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 15px;
        }

        .contact-form-side>p {
            color: #64748b;
            margin-bottom: 40px;
            font-size: 1.1rem;
        }

        .form-label {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 10px;
        }

        .form-control,
        .form-select {
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 12px 20px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.25rem rgba(99, 102, 241, 0.15);
        }

        textarea.form-control {
            min-height: 150px;
            resize: vertical;
        }

        .btn-primary {
            /* background: linear-gradient(135deg, var(--primary), var(--secondary));
                                border: none;
                                padding: 15px 40px;
                                border-radius: 25px;
                                font-weight: 700;
                                font-size: 1.1rem;
                                transition: all 0.3s ease;
                                box-shadow: 0 5px 20px rgba(99, 102, 241, 0.3);
                                width: 100%; */
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border: none;
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(99, 102, 241, 0.5);
        }


        /* Map Section */
        .map-section {
            padding: 80px 0;
            background: var(--light);
        }

        .map-container {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            height: 450px;
            background: #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #64748b;
        }

        /* Support Cards */
        .support-section {
            padding: 80px 0;
            background: white;
        }

        .support-card {
            background: var(--light);
            border-radius: 20px;
            padding: 40px;
            text-align: center;
            transition: all 0.4s ease;
            height: 100%;
            border: 2px solid transparent;
        }

        .support-card:hover {
            border-color: var(--primary);
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .support-icon {
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

        .support-card:hover .support-icon {
            transform: rotateY(360deg);
        }

        .support-card h4 {
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 15px;
            font-size: 1.5rem;
        }

        .support-card p {
            color: #64748b;
            line-height: 1.7;
            margin-bottom: 20px;
        }

        .support-card a {
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .support-card a:hover {
            color: var(--secondary);
        }

        /* Success Message */
        .success-message {
            position: fixed;
            top: 20px;
            right: 20px;
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            padding: 20px 30px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(16, 185, 129, 0.4);
            display: none;
            animation: slideInRight 0.5s ease;
            z-index: 9999;
        }

        @keyframes slideInRight {
            from {
                transform: translateX(400px);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
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
            .contact-hero h1 {
                font-size: 2.5rem;
            }

            .contact-form-side,
            .contact-info-side {
                padding: 40px 30px;
            }

            .section-title h2 {
                font-size: 2rem;
            }
        }
    </style>


    <!-- Hero Section -->
    <section class="contact-hero">
        <div class="container text-center">
            <h1>Get In Touch</h1>
            <p>Have questions? We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
        </div>
    </section>
    @if (session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif
    <!-- Contact Form Section -->
    @include('components.forms.contactform')
   

    <!-- Support Cards Section -->
    @include('components.sections.supports')


    <!-- FAQ Section -->
    @include('components.sections.faq')

    <!-- Map Section -->
    @include('components.sections.mapsection')

    <!-- Success Message -->
    <div class="success-message" id="successMessage">
        <i class="fas fa-check-circle"></i> <strong>Success!</strong> Your message has been sent.
    </div>

@endsection
