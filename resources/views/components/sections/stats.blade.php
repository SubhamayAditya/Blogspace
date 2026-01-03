<style>
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
</style>
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