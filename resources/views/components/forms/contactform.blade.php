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

                         <form method="post" action="{{ route('contact.submit') }}">
                             @csrf
                             <div class="row">
                                 <div class="col-md-6 mb-3">
                                     <label class="form-label">First Name *</label>
                                     <input type="text" class="form-control" name="firstName" id="firstName">

                                     @error('firstName')
                                         <span style="color: red">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                     @enderror
                                 </div>
                                 <div class="col-md-6 mb-3">
                                     <label class="form-label">Last Name *</label>
                                     <input type="text" class="form-control" name="lastName" id="lastName">

                                     @error('lastName')
                                         <span style="color: red">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                     @enderror
                                 </div>
                             </div>

                             <div class="mb-3">
                                 <label class="form-label">Email Address *</label>
                                 <input type="email" class="form-control" name="email" id="email">

                                 @error('email')
                                     <span style="color: red">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                             </div>

                             <div class="mb-3">
                                 <label class="form-label">Phone Number</label>
                                 <input type="tel" class="form-control" name="phone" id="phone">

                                 @error('phone')
                                     <span style="color: red">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                 @enderror
                             </div>

                             <div class="mb-3">
                                 <label class="form-label">Subject *</label>
                                 <select class="form-select" name="subject" required id="subject">
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
                                 <textarea class="form-control" name="message" id="message" required placeholder="Tell us more about your inquiry..."></textarea>
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
