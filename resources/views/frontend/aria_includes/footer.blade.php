    <!-- Footer -->
    <div class="footer py-5" style="background-color: #113448; color: #dfe5ec;">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                    <div class="text-container about">
                        <h4 class="text-white font-weight-bold mb-3" style="font-family: 'Montserrat', sans-serif;">
                            <i class="fas fa-bus-alt text-success mr-2"></i>Bus-Book
                        </h4>
                        <p class="text-muted small" style="color: #a4b3be !important; line-height: 1.8;">
                            Bus-Book is India's leading digital ticketing platform connecting passengers with safe, trusted, and verified bus operators. Experience fast booking, instant confirmations, and reliable on-time journeys.
                        </p>
                        <div class="mt-3">
                            <span class="badge badge-pill badge-success px-3 py-2" style="background-color: #14bf98; font-size: 0.8rem;">
                                <i class="fas fa-shield-alt mr-1"></i> Verified & Safe Travel
                            </span>
                        </div>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->

                <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
                    <div class="text-container">
                        <h5 class="text-white font-weight-bold mb-3" style="font-family: 'Montserrat', sans-serif;">Quick Links</h5>
                        <ul class="list-unstyled li-space-lg small" style="line-height: 2;">
                            <li><a class="text-muted text-decoration-none" href="{{ route('home') }}"><i class="fas fa-angle-right mr-1 text-success"></i> Home</a></li>
                            <li><a class="text-muted text-decoration-none" href="{{ route('cus.show.booking') }}"><i class="fas fa-angle-right mr-1 text-success"></i> Book Tickets</a></li>
                            <li><a class="text-muted text-decoration-none" href="{{ route('bus.reg.show') }}"><i class="fas fa-angle-right mr-1 text-success"></i> Partner With Us</a></li>
                            <li><a class="text-muted text-decoration-none" href="#services"><i class="fas fa-angle-right mr-1 text-success"></i> Popular Routes</a></li>
                        </ul>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->

                <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
                    <div class="text-container">
                        <h5 class="text-white font-weight-bold mb-3" style="font-family: 'Montserrat', sans-serif;">User Account</h5>
                        <ul class="list-unstyled li-space-lg small" style="line-height: 2;">
                            @guest
                                <li><a class="text-muted text-decoration-none" href="{{ route('login') }}"><i class="fas fa-angle-right mr-1 text-success"></i> Customer Sign In</a></li>
                                <li><a class="text-muted text-decoration-none" href="{{ route('register') }}"><i class="fas fa-angle-right mr-1 text-success"></i> Register Account</a></li>
                            @else
                                <li><a class="text-muted text-decoration-none" href="{{ route('cus.show.booking') }}"><i class="fas fa-angle-right mr-1 text-success"></i> My Bookings</a></li>
                            @endguest
                            <li><a class="text-muted text-decoration-none" href="{{ route('admin.login') }}"><i class="fas fa-angle-right mr-1 text-success"></i> Admin Portal</a></li>
                        </ul>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->

                <div class="col-lg-3 col-md-6">
                    <div class="text-container">
                        <h5 class="text-white font-weight-bold mb-3" style="font-family: 'Montserrat', sans-serif;">24/7 Helpline</h5>
                        <p class="text-muted small mb-2" style="color: #a4b3be !important;">Customer Support: <strong>+91 1800-123-4567</strong></p>
                        <p class="text-muted small mb-3" style="color: #a4b3be !important;">Email: <strong>support@busbook.com</strong></p>
                        <div class="social-links-footer">
                            <a href="#" class="btn btn-sm btn-outline-light mr-1" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="btn btn-sm btn-outline-light mr-1" title="Twitter"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="btn btn-sm btn-outline-light mr-1" title="Instagram"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="btn btn-sm btn-outline-light" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->

            <div class="row pt-4 mt-4 border-top border-secondary text-center">
                <div class="col-12">
                    <p class="text-muted small mb-0" style="color: #8fa0ad !important;">
                        &copy; {{ date('Y') }} Bus-Book Services Pvt. Ltd. All Rights Reserved. Designed with care for seamless travel.
                    </p>
                </div>
            </div>
        </div> <!-- end of container -->
    </div> <!-- end of footer -->