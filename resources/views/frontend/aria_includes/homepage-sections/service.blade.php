<!-- Services -->
<div id="services" class="cards-2 py-5" style="background-color: #fbfbfb;">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-lg-12">
                <div class="section-title text-uppercase font-weight-bold" style="color: #14bf98; letter-spacing: 1px;">
                    <i class="fas fa-th-large mr-1"></i> POPULAR SERVICES
                </div>
                <h2 class="mt-2" style="font-family: 'Montserrat', sans-serif; font-weight: 700;">
                    Tailored Bus Travel For Every Journey
                </h2>
                <p class="text-muted mx-auto" style="max-width: 650px;">
                    From daily city connects to luxury long-distance sleepers, select the travel category that matches your schedule and comfort needs.
                </p>
            </div> <!-- end of col -->
        </div> <!-- end of row -->

        <div class="row">
            <!-- Card 1 -->
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="service-card h-100">
                    <div class="card-image-box">
                        <img class="img-fluid" src="{{ asset('images/bus-card-1.jpg') }}" alt="Express City Commute">
                        <span class="category-pill">Express</span>
                    </div>
                    <div class="card-content p-4 d-flex flex-column justify-content-between">
                        <div>
                            <h4 class="card-title font-weight-bold mb-2" style="font-family: 'Montserrat', sans-serif; font-size: 1.25rem;">
                                City Express Connect
                            </h4>
                            <p class="card-desc text-muted small mb-3">
                                Frequent point-to-point buses designed for daily office commuters and quick city hopping.
                            </p>
                            <ul class="list-unstyled feature-list mb-4">
                                <li><i class="fas fa-check text-success mr-2"></i> High-frequency daily departures</li>
                                <li><i class="fas fa-check text-success mr-2"></i> Fast-track highway routing</li>
                                <li><i class="fas fa-check text-success mr-2"></i> Push-back ergonomic seating</li>
                            </ul>
                        </div>
                        <div>
                            <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                                <div>
                                    <span class="text-muted small d-block">Starting from</span>
                                    <span class="price-tag font-weight-bold" style="color: #14bf98; font-size: 1.35rem;">₹199</span>
                                </div>
                                <a class="btn-solid-reg" href="{{ route('cus.show.booking') }}">
                                    Book Seat
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="service-card h-100 service-card-featured">
                    <div class="card-image-box">
                        <img class="img-fluid" src="{{ asset('images/bus-card-2.jpg') }}" alt="Luxury Sleeper Bus">
                        <span class="category-pill featured-pill">Popular</span>
                    </div>
                    <div class="card-content p-4 d-flex flex-column justify-content-between">
                        <div>
                            <h4 class="card-title font-weight-bold mb-2" style="font-family: 'Montserrat', sans-serif; font-size: 1.25rem;">
                                Luxury AC Sleeper
                            </h4>
                            <p class="card-desc text-muted small mb-3">
                                Overnight travel with individual berths, charging outlets, reading lights, and air suspension.
                            </p>
                            <ul class="list-unstyled feature-list mb-4">
                                <li><i class="fas fa-check text-success mr-2"></i> Clean berth bedding & pillows</li>
                                <li><i class="fas fa-check text-success mr-2"></i> USB charging ports & WiFi</li>
                                <li><i class="fas fa-check text-success mr-2"></i> Smooth air-cushioned ride</li>
                            </ul>
                        </div>
                        <div>
                            <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                                <div>
                                    <span class="text-muted small d-block">Starting from</span>
                                    <span class="price-tag font-weight-bold" style="color: #14bf98; font-size: 1.35rem;">₹499</span>
                                </div>
                                <a class="btn-solid-reg" href="{{ route('cus.show.booking') }}">
                                    Book Seat
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="service-card h-100">
                    <div class="card-image-box">
                        <img class="img-fluid" src="{{ asset('images/bus-card-3.jpg') }}" alt="Family & Group Charters">
                        <span class="category-pill">Group</span>
                    </div>
                    <div class="card-content p-4 d-flex flex-column justify-content-between">
                        <div>
                            <h4 class="card-title font-weight-bold mb-2" style="font-family: 'Montserrat', sans-serif; font-size: 1.25rem;">
                                Group & Tour Charters
                            </h4>
                            <p class="card-desc text-muted small mb-3">
                                Spacious buses ideal for family vacations, corporate outings, pilgrimage tours, and events.
                            </p>
                            <ul class="list-unstyled feature-list mb-4">
                                <li><i class="fas fa-check text-success mr-2"></i> Flexible multi-stop itinerary</li>
                                <li><i class="fas fa-check text-success mr-2"></i> Dedicated professional driver</li>
                                <li><i class="fas fa-check text-success mr-2"></i> Large luggage storage bays</li>
                            </ul>
                        </div>
                        <div>
                            <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                                <div>
                                    <span class="text-muted small d-block">Starting from</span>
                                    <span class="price-tag font-weight-bold" style="color: #14bf98; font-size: 1.35rem;">₹799</span>
                                </div>
                                <a class="btn-solid-reg" href="{{ route('cus.show.booking') }}">
                                    Book Seat
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of cards-2 -->
<!-- end of services -->