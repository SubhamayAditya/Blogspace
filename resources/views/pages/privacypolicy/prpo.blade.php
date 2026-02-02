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
 <section class="mission-section">
     <div class="container">
         <div class="mission-card">
             <h2><i class="fas fa-bullseye"></i> Privacy Policy</h2>
             <p>If you require any more information or have any questions about our privacy policy, please feel free to
                 check our Contact form!

                 At thepetsmagazine.com, the privacy of our visitors is of extreme importance to us. This privacy policy
                 document outlines the types of personal information received and collected by The Pets Magazine and how
                 it is used.</p>
             <p class="mb-0">Log Files
                 Similar to most websites, The Pets Magazine utilizes log files. These files contain data like IP
                 addresses, browser types, Internet Service Providers (ISPs), timestamps, pages you visited before and
                 after, and the number of clicks you make.

                 We use this information to understand website trends, manage the site, follow how users move through
                 it, and collect demographic data. Importantly, we never connect IP addresses or this data to any
                 personally identifiable information. Your privacy is our priority.</p>
             <p class="mb-0">Cookies and Web Beacons
                 At The Pets Magazine, we use cookies to remember what you like, keep track of which pages you visit,
                 and personalize our website based on your browser and the information you share through it. This helps
                 us provide you with a better experience.</p>
             <p class="mb-0">Affiliate Disclosure
                 Some of the links that you might find on the site can have affiliate links. In case you click on that
                 link and purchase the orioduct, we will be able to earn a small commission with no additional cost to
                 you.

                 For better understanding and details, please read our Affiliate Disclosure.</p>
         </div>
     </div>
 </section>

 @endsection