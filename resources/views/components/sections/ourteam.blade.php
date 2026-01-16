 <style>
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
 </style>
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