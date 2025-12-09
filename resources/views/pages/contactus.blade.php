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

        /* FAQ Section */
        .faq-section {
            padding: 80px 0;
            background: white;
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

        .faq-item {
            background: var(--light);
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
            cursor: pointer;
            border: 2px solid transparent;
        }

        .faq-item:hover {
            border-color: var(--primary);
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .faq-question {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 700;
            color: var(--dark);
            font-size: 1.1rem;
        }

        .faq-icon {
            width: 35px;
            height: 35px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: transform 0.3s ease;
        }

        .faq-item.active .faq-icon {
            transform: rotate(45deg);
        }

        .faq-answer {
            color: #64748b;
            margin-top: 20px;
            line-height: 1.8;
            display: none;
        }

        .faq-item.active .faq-answer {
            display: block;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
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

    <!-- Contact Form Section -->
    <section class="contact-section">
        <div class="container">
            <div class="contact-container">
                <div class="row g-0">
                    <div class="col-lg-5">
                        <div class="contact-info-side">
                            <h3>Contact Information</h3>
                            <p>Fill up the form and our team will get back to you within 24 hours.</p>

                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="contact-item-content">
                                    <h5>Phone</h5>
                                    <p>+1 (555) 123-4567</p>
                                    <p>Mon-Fri 9am-6pm EST</p>
                                </div>
                            </div>

                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="contact-item-content">
                                    <h5>Email</h5>
                                    <p>support@blogspace.com</p>
                                    <p>24/7 Support</p>
                                </div>
                            </div>

                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="contact-item-content">
                                    <h5>Office</h5>
                                    <p>123 Blog Street, Suite 456</p>
                                    <p>San Francisco, CA 94102</p>
                                </div>
                            </div>

                            <div class="social-links-contact">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-facebook"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                                <a href="#"><i class="fab fa-github"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <div class="contact-form-side">
                            <h3>Send us a Message</h3>
                            <p>We're here to help and answer any question you might have.</p>

                            <form id="contactForm">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">First Name *</label>
                                        <input type="text" class="form-control" id="firstName" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Last Name *</label>
                                        <input type="text" class="form-control" id="lastName" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Email Address *</label>
                                    <input type="email" class="form-control" id="email" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" id="phone">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Subject *</label>
                                    <select class="form-select" id="subject" required>
                                        <option value="" selected disabled>Select a subject</option>
                                        <option value="general">General Inquiry</option>
                                        <option value="support">Technical Support</option>
                                        <option value="billing">Billing Question</option>
                                        <option value="partnership">Partnership Opportunity</option>
                                        <option value="feedback">Feedback</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Message *</label>
                                    <textarea class="form-control" id="message" required placeholder="Tell us more about your inquiry..."></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-paper-plane"></i> Send Message
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Support Cards Section -->
    <section class="support-section">
        <div class="container">
            <div class="section-title">
                <h2>Other Ways to Reach Us</h2>
                <p>Choose the best way to get help</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="support-card">
                        <div class="support-icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <h4>Knowledge Base</h4>
                        <p>Browse our comprehensive documentation and find answers to common questions.</p>
                        <a href="#">Visit Knowledge Base <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="support-card">
                        <div class="support-icon">
                            <i class="fas fa-comments"></i>
                        </div>
                        <h4>Live Chat</h4>
                        <p>Chat with our support team in real-time. Available Monday-Friday 9am-6pm EST.</p>
                        <a href="#">Start Chat <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="support-card">
                        <div class="support-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h4>Community Forum</h4>
                        <p>Connect with other users, share tips, and get help from the community.</p>
                        <a href="#">Join Forum <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="container">
            <div class="section-title">
                <h2>Frequently Asked Questions</h2>
                <p>Quick answers to common questions</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="faq-item" onclick="toggleFaq(this)">
                        <div class="faq-question">
                            <span>How do I create a new blog post?</span>
                            <div class="faq-icon"><i class="fas fa-plus"></i></div>
                        </div>
                        <div class="faq-answer">
                            Click on the "Write" button in the navigation bar, fill in your blog details including title,
                            category, and content, then click "Publish" when you're ready to share your post with the world.
                        </div>
                    </div>

                    <div class="faq-item" onclick="toggleFaq(this)">
                        <div class="faq-question">
                            <span>Is BlogSpace free to use?</span>
                            <div class="faq-icon"><i class="fas fa-plus"></i></div>
                        </div>
                        <div class="faq-answer">
                            Yes! BlogSpace offers a free plan that includes all essential features. We also offer premium
                            plans with additional features like advanced analytics, custom domains, and priority support.
                        </div>
                    </div>

                    <div class="faq-item" onclick="toggleFaq(this)">
                        <div class="faq-question">
                            <span>Can I customize the look of my blog?</span>
                            <div class="faq-icon"><i class="fas fa-plus"></i></div>
                        </div>
                        <div class="faq-answer">
                            Absolutely! You can customize your blog's theme, colors, fonts, and layout. Premium users get
                            access to advanced customization options and custom CSS.
                        </div>
                    </div>

                    <div class="faq-item" onclick="toggleFaq(this)">
                        <div class="faq-question">
                            <span>How do I grow my audience?</span>
                            <div class="faq-icon"><i class="fas fa-plus"></i></div>
                        </div>
                        <div class="faq-answer">
                            Use relevant tags, share your posts on social media, engage with other bloggers' content, post
                            consistently, and optimize your titles and descriptions for search engines. Our analytics tools
                            can help you understand what content resonates with your audience.
                        </div>
                    </div>

                    <div class="faq-item" onclick="toggleFaq(this)">
                        <div class="faq-question">
                            <span>What are your response times for support?</span>
                            <div class="faq-icon"><i class="fas fa-plus"></i></div>
                        </div>
                        <div class="faq-answer">
                            We aim to respond to all inquiries within 24 hours on business days. Premium users receive
                            priority support with response times under 4 hours during business hours.
                        </div>
                    </div>

                    <div class="faq-item" onclick="toggleFaq(this)">
                        <div class="faq-question">
                            <span>Can I migrate my existing blog to BlogSpace?</span>
                            <div class="faq-icon"><i class="fas fa-plus"></i></div>
                        </div>
                        <div class="faq-answer">
                            Yes! We support importing from major blogging platforms including WordPress, Medium, Blogger,
                            and more. Our migration tool makes it easy to transfer your content while preserving formatting
                            and images.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="map-section">
        <div class="container">
            <div class="section-title">
                <h2>Visit Our Office</h2>
                <p>We'd love to meet you in person</p>
            </div>
            <div class="map-container">
                <div class="text-center">
                    <i class="fas fa-map-marked-alt fa-4x mb-3"></i>
                    <h4>Map Location</h4>
                    <p>123 Blog Street, Suite 456<br>San Francisco, CA 94102</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Success Message -->
    <div class="success-message" id="successMessage">
        <i class="fas fa-check-circle"></i> <strong>Success!</strong> Your message has been sent.
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
    <script>
        // FAQ Toggle
        function toggleFaq(element) {
            const wasActive = element.classList.contains('active');

            // Close all FAQ items
            document.querySelectorAll('.faq-item').forEach(item => {
                item.classList.remove('active');
            });

            // Open clicked item if it wasn't already open
            if (!wasActive) {
                element.classList.add('active');
            }
        }

        // Contact Form Submission
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const firstName = document.getElementById('firstName').value;
            const lastName = document.getElementById('lastName').value;
            const email = document.getElementById('email').value;
            const phone = document.getElementById('phone').value;
            const subject = document.getElementById('subject').value;
            const message = document.getElementById('message').value;

            if (!firstName || !lastName || !email || !subject || !message) {
                showMessage('Please fill in all required fields.', 'warning');
                return;
            }

            // Email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                showMessage('Please enter a valid email address.', 'warning');
                return;
            }

            // Simulate form submission
            showMessage('Thank you for contacting us! We\'ll get back to you within 24 hours.', 'success');

            // Reset form
            this.reset();
        });

        // Show Message
        function showMessage(message, type) {
            const messageDiv = document.getElementById('successMessage');
            messageDiv.innerHTML = `
                <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-triangle'}"></i> 
                <strong>${type === 'success' ? 'Success!' : 'Notice'}</strong> ${message}
            `;
            messageDiv.style.display = 'block';
            messageDiv.style.background = type === 'success' ?
                'linear-gradient(135deg, #10b981, #059669)' :
                'linear-gradient(135deg, #f59e0b, #d97706)';

            setTimeout(() => {
                messageDiv.style.display = 'none';
            }, 4000);
        }
    </script>
@endsection
