<!-- Contact -->
<div id="contact" class="form-2 py-5" style="background-color: #ffffff;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="text-container pr-lg-4">
                    <div class="section-title text-uppercase font-weight-bold" style="color: #14bf98; letter-spacing: 1px;">
                        <i class="fas fa-headset mr-1"></i> NEED ASSISTANCE?
                    </div>
                    <h2 class="mt-2 mb-3" style="font-family: 'Montserrat', sans-serif; font-weight: 700; color: #113448;">
                        We Are Here to Help 24/7
                    </h2>
                    <p class="text-muted" style="line-height: 1.7;">
                        Have questions about ticket bookings, bus boarding points, partner registrations, or refunds? Our support team is always ready to assist you.
                    </p>

                    <div class="contact-cards mt-4">
                        <div class="media mb-3 align-items-center p-3 rounded" style="background: #f8fafc; border: 1px solid #e2e8f0;">
                            <div class="contact-icon mr-3" style="width: 44px; height: 44px; border-radius: 50%; background: rgba(20, 191, 152, 0.15); display: flex; align-items: center; justify-content: center; color: #14bf98; font-size: 1.1rem;">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div class="media-body">
                                <span class="d-block text-muted small">Customer Helpline</span>
                                <a href="tel:+9118001234567" class="font-weight-bold text-dark text-decoration-none">+91 1800-123-4567 / (020) 2463-0820</a>
                            </div>
                        </div>

                        <div class="media mb-3 align-items-center p-3 rounded" style="background: #f8fafc; border: 1px solid #e2e8f0;">
                            <div class="contact-icon mr-3" style="width: 44px; height: 44px; border-radius: 50%; background: rgba(20, 191, 152, 0.15); display: flex; align-items: center; justify-content: center; color: #14bf98; font-size: 1.1rem;">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="media-body">
                                <span class="d-block text-muted small">Support Email</span>
                                <a href="mailto:support@busbook.com" class="font-weight-bold text-dark text-decoration-none">support@busbook.com</a>
                            </div>
                        </div>

                        <div class="media mb-4 align-items-center p-3 rounded" style="background: #f8fafc; border: 1px solid #e2e8f0;">
                            <div class="contact-icon mr-3" style="width: 44px; height: 44px; border-radius: 50%; background: rgba(20, 191, 152, 0.15); display: flex; align-items: center; justify-content: center; color: #14bf98; font-size: 1.1rem;">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="media-body">
                                <span class="d-block text-muted small">Headquarters</span>
                                <span class="font-weight-bold text-dark">Central Transport Hub, MG Road, Pune, Maharashtra 411001</span>
                            </div>
                        </div>
                    </div>
                </div> <!-- end of text-container -->
            </div> <!-- end of col -->

            <div class="col-lg-6">
                <!-- Contact Form Card -->
                <div class="card border-0 shadow-lg p-4 p-md-5" style="border-radius: 14px; background: #ffffff;">
                    <h4 class="font-weight-bold mb-3" style="font-family: 'Montserrat', sans-serif; color: #113448;">
                        Send Us an Inquiry
                    </h4>
                    <p class="text-muted small mb-4">Fill out the form below and our team will get back to you within 2 business hours.</p>

                    <form id="contactForm" onsubmit="event.preventDefault(); alert('Thank you for contacting Bus-Book! Our support team will reach out shortly.'); this.reset();">
                        <div class="form-group mb-3">
                            <label class="font-weight-bold small text-muted mb-1" for="cname">Your Name</label>
                            <input type="text" class="form-control" id="cname" placeholder="John Doe" required style="border-radius: 6px; padding: 10px 14px; height: auto;">
                        </div>

                        <div class="form-group mb-3">
                            <label class="font-weight-bold small text-muted mb-1" for="cemail">Email Address</label>
                            <input type="email" class="form-control" id="cemail" placeholder="name@example.com" required style="border-radius: 6px; padding: 10px 14px; height: auto;">
                        </div>

                        <div class="form-group mb-4">
                            <label class="font-weight-bold small text-muted mb-1" for="cmessage">Your Message or Booking PNR</label>
                            <textarea class="form-control" id="cmessage" rows="4" placeholder="How can we assist you today?" required style="border-radius: 6px; padding: 12px 14px;"></textarea>
                        </div>

                        <button type="submit" class="btn-solid-lg btn-block w-100" style="padding: 14px; font-weight: 700; border-radius: 6px;">
                            <i class="fas fa-paper-plane mr-2"></i> Submit Inquiry
                        </button>
                    </form>
                </div> <!-- end of card -->
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of form-2 -->
<!-- end of contact -->