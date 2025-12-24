
<style>
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

</style>

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