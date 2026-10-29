@extends('layouts.frontend.aria')

@section('content')
    <div class="bus-book-form-container">
        <div class="container">
            <div class="form-1">
                <div class="container">

                    {{-- Page heading --}}
                    <div class="row justify-content-center mb-5">
                        <div class="col-12 text-center">
                            <h2 class="text-white font-weight-bold" style="font-family: 'Montserrat', sans-serif;">Book Your Journey</h2>
                            <p class="text-white-50 small">Select your route, travel date and pick your seats.</p>
                        </div>
                    </div>

                    <div class="row">

                        {{-- ===== LEFT COL: Booking Form ===== --}}
                        <div class="col-lg-6">
                            <form id="booking-form" method="POST" action="{{ route('cus.post.booking') }}">
                                @csrf

                                {{-- Passenger Details --}}
                                <span class="field-section-label">Passenger Details</span>

                                <div class="form-group">
                                    <input type="text" class="form-control-input notEmpty" id="cus_name" name="cus_name" required>
                                    <label class="label-control" for="cus_name">Full Name</label>
                                </div>

                                <div class="form-group">
                                    <input type="tel" class="form-control-input" id="cus_phone" name="cus_phone">
                                    <label class="label-control" for="cus_phone">Phone Number</label>
                                </div>

                                <div class="form-group">
                                    <input type="email" class="form-control-input" id="cus_email" name="cus_email">
                                    <label class="label-control" for="cus_email">Email Address</label>
                                </div>

                                <div class="form-group">
                                    <input type="number" class="form-control-input" id="cus_age" name="cus_age" min="1" max="120">
                                    <label class="label-control" for="cus_age">Age</label>
                                </div>

                                {{-- Travel Details --}}
                                <span class="field-section-label mt-4">Date of Travel &amp; Bus</span>

                                <div class="form-group">
                                    <select class="form-control-select" id="from" name="from" required>
                                        <option value="" disabled selected>From</option>
                                        <option value="Nashik">Nashik</option>
                                        <option value="Pune">Pune</option>
                                        <option value="Hydrabad">Hyderabad</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <select class="form-control-select" id="to" name="to" required>
                                        <option value="" disabled selected>To</option>
                                        <option value="Nashik">Nashik</option>
                                        <option value="Pune">Pune</option>
                                        <option value="Hydrabad">Hyderabad</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="date" class="form-control-input notEmpty" id="booking_date" name="booking_date" required>
                                    <label class="label-control" for="booking_date">Travel Date</label>
                                </div>

                                <p id="number" class="text-white-50 small mb-2"></p>

                                <div class="form-group">
                                    <select class="form-control-select" id="busSelect" name="busSelect" required>
                                        <option value="" disabled selected>Select a Bus</option>
                                        @foreach ($buses as $bus)
                                            <option value="{{ $bus->id }}" data-total-seats="{{ $bus->bus_total_seats }}">
                                                {{ $bus->bus_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- Hidden: carries seat list on AJAX submit --}}
                                <input type="hidden" id="selected_seats_input" name="seats">

                            </form>
                        </div>
                        {{-- end left col --}}

                        {{-- ===== RIGHT COL: Seat Map ===== --}}
                        <div class="col-lg-6">
                            <span class="field-section-label">Select Your Seats</span>

                            {{-- Legend --}}
                            <div class="seat-legend mb-3">
                                <span class="legend-item">
                                    <span class="legend-box" style="background:rgba(255,255,255,0.15); border:2px solid rgba(255,255,255,0.6);"></span>
                                    <span class="text-white-50 small">Available</span>
                                </span>
                                <span class="legend-item">
                                    <span class="legend-box" style="background:#14bf98;"></span>
                                    <span class="text-white-50 small">Selected</span>
                                </span>
                                <span class="legend-item">
                                    <span class="legend-box" style="background:#e67e22;"></span>
                                    <span class="text-white-50 small">Your Booking</span>
                                </span>
                                <span class="legend-item">
                                    <span class="legend-box" style="background:#e74c3c;"></span>
                                    <span class="text-white-50 small">Booked</span>
                                </span>
                            </div>

                            {{-- Seat grid --}}
                            <div class="seat-selection" id="seatSelection">
                                <p class="text-white-50 text-center small mt-2 mb-2" id="seat-placeholder">
                                    Select a bus to view available seats.
                                </p>
                            </div>
                        </div>
                        {{-- end right col --}}

                    </div>
                    {{-- end row --}}

                    {{-- Confirm button --}}
                    <div class="row justify-content-center mt-4">
                        <div class="col-12 col-md-8 col-lg-5">
                            <button type="button" class="form-control-submit-button" id="submit-booking-form">
                                Confirm Booking
                            </button>
                        </div>
                    </div>

                    {{-- Terms --}}
                    <div class="form-group checkbox white text-center mt-3">
                        <input type="checkbox" id="lterms" name="lterms">
                        I agree with Aria's
                        <a href="privacy-policy.html">Privacy Policy</a> and
                        <a href="terms-conditions.html">Terms &amp; Conditions</a>
                    </div>

                </div>
                {{-- end inner container --}}
            </div>
            {{-- end form-1 --}}
        </div>
    </div>
@endsection
