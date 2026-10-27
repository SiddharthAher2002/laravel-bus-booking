@extends('layouts.frontend.aria')

@section('content')
    <div class ="bus-book-form-container ">
        <div class="container">
            <div class="form-1">
                <div class="container">
                    <div class="row justify-content-center mb-4">
                        <div class="col-12 text-center">
                            <h2 class="text-white font-weight-bold" style="font-family: 'Montserrat', sans-serif;">Book Your Journey</h2>
                            <p class="text-muted small">Select your travel date, destination, and choose your preferred seats.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Call Me Form -->
                            <form method="post">
                                <label>Passenger Details</label>
                                <div class="form-group">
                                    <input type="text" class="form-control-input" id="cus_name" name="cus_name">
                                     <label class="label-control" for="cus_name">Name</label>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control-input" id="cus_phone" name="cus_phone">
                                    <label class="label-control" for="cus_phone">Phone</label>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control-input" id="cus_email" name="cus_email">
                                    <label class="label-control" for="cus_email">Email</label>
                                </div>
                                <div class="form-group">
                                    <input type="age" class="form-control-input" id="cus_age" name="cus_age">
                                    <label class="label-control" for="cus_age">Age</label>
                                </div>

                                <label>Date of Travel & Select Bus</label>
                                <div class="form-group">
                                    <select class="form-control-select" id="from" name="from">
                                        <option class="select-option" value="" disabled selected>From</option>
                                        <option class="select-option" value="Nashik" >Nashik</option>
                                        <option class="select-option" value="Pune" >Pune</option>
                                        <option class="select-option" value="Hydrabad" >Hydrabad</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control-select" id="to" name="to">
                                        <option class="select-option" value="" disabled selected>To</option>
                                        <option class="select-option" value="Nashik" >Nashik</option>
                                        <option class="select-option" value="Pune" >Pune</option>
                                        <option class="select-option" value="Hydrabad" >Hydrabad</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="date" class="form-control-input" id="booking_date" name="booking_date">
                                </div>
                                <p id="number" style="font-size:14px;margin: 0px;"></p>

                                <div class="form-group">
                                    <select class="form-control-select" id="busSelect" name="busSelect">
                                        <option class="select-option" value="" disabled selected>Available Buses</option>
                                        @foreach ($buses as $bus)
                                            <option class="select-option" value="{{ $bus->id }}"
                                                data-total-seats="{{ $bus->bus_total_seats }}">
                                                {{ $bus->bus_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </form>
                            <!-- end of call me form -->
                        </div> <!-- end of col -->


                        <div class="col-lg-6">
                            <label for="seatSelect" class="form-label text-center d-block font-weight-bold">Select Your Seats</label>
                            
                            <div class="seat-legend mb-3 text-center">
                                <span class="badge badge-secondary mr-2"><i class="far fa-square mr-1"></i> Available</span>
                                <span class="badge badge-success mr-2" style="background-color: #14bf98;"><i class="fas fa-check-square mr-1"></i> Selected</span>
                                <span class="badge badge-warning text-dark"><i class="fas fa-times-circle mr-1"></i> Booked</span>
                            </div>

                            <div class="seat-selection" id="seatSelection">
                                <!-- Render the Seats from ajax -->
                            </div>
                        </div> <!-- end of col -->

                        
                    </div> <!-- end of row -->
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-6 col-lg-4 form-group">
                            <button type="submit" class="form-control-submit-button btn-block" id="submit-booking-form">CONFIRM BOOKING</button>
                        </div>
                    </div>

                    <div class="form-group checkbox white">
                        <input type="checkbox" id="lterms" value="Agreed-to-Terms" name="lterms" required>I agree with
                        Aria's stated <a class="white" href="privacy-policy.html">Privacy Policy</a> and <a class="white"
                            href="terms-conditions.html">Terms & Conditions</a>
                        <div class="help-block with-errors"></div>
                    </div>

                </div> <!-- end of container -->
            </div> <!-- end of form-1 -->
            <!-- end of call me -->
        </div>
    </div>

    <!-- Call Me -->
@endsection
