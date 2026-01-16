<style>
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
</style>
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
                        First of all User should Register and after Adminstrator approve the request then Login with Credentials ,
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
</script>
