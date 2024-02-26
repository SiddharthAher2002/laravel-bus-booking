@extends('layouts.frontend.aria')

@section('content')
    <div class ="bus-book-form-container ">
        <div class="container">
            <div class="form-1">
                <div class="container">
                    <div class="row justify-content-center mb-4">
                        <div class="col-6">
                            <h3 class="text-light">Book Your Journey Now!</h3>
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
                            <label for="seatSelect" class="form-label text-center">Select a Seats</label><br>
                            <div class="seat-selection d-block" id="seatSelection">
                                <!-- Render the Seats from ajax -->
                            </div>
                        </div> <!-- end of col -->

                        
                    </div> <!-- end of row -->
                    <div class="row justify-content-center">
                        <div class="col-4 form-group">
                            <button type="" class="form-control-submit-button" id="submit-booking-form">BOOK NOW</button>
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
