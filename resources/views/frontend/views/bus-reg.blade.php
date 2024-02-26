@extends('layouts.frontend.aria')
@section('content')
    <div class="register-bus-container">
        <div class="form-1 container">
            <h3 class="text-light">Register Your Bus!</h3>
            <div id="callMe" class="form-1">
                <div class="container">
                    <form method="post" action="{{ route('bus.reg.post') }}">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" class="form-control-input" id="busName" name="busName">
                                    <label class="label-control" for="lname">Bus Name</label>
                                    @error('busName')
                                        <div class="help-block with-errors alert alert-danger mt-1 mb-1">{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control-input" id="busSource" name="busSource">
                                    <label class="label-control" for="busSource">Bus Source</label>
                                    @error('busSource')
                                        <div class="help-block with-errors alert alert-danger mt-1 mb-1">{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control-input" id="busDestination"
                                        name="busDestination">
                                    <label class="label-control" for="busDestination">Bus Destination</label>
                                    @error('busDestination')
                                        <div class="help-block with-errors alert alert-danger mt-1 mb-1">{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="number" class="form-control-input" id="fare" name="fare">
                                    <label class="label-control" for="fare">Fair Amount</label>
                                    @error('fare')
                                        <div class="help-block with-errors alert alert-danger mt-1 mb-1">{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div> <!-- end of col -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="email" class="form-control-input" id="busemail" name="busemail">
                                    <label class="label-control" for="busemail">Bus Email</label>
                                    @error('busemail')
                                        <div class="help-block with-errors alert alert-danger mt-1 mb-1">{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control-input" id="distance" name="distance">
                                    <label class="label-control" for="distance">Distance</label>
                                    @error('distance')
                                        <div class="help-block with-errors alert alert-danger mt-1 mb-1">{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control-input" id="travelTime" name="travelTime">
                                    <label class="label-control" for="travelTime">Travel Time</label>
                                    @error('travelTime')
                                        <div class="help-block with-errors alert alert-danger mt-1 mb-1">{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control-input" id="totalSeats" name="totalSeats">
                                    <label class="label-control" for="totalSeats">Total Seats</label>
                                    @error('totalSeats')
                                        <div class="help-block with-errors alert alert-danger mt-1 mb-1">{{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div> <!-- end of col -->
                        </div> <!-- end of row -->
                        <div class = "row justify-content-center mt-3">
                            <div class = "col-4">
                                <div class="form-group">
                                    <button type="submit" class="form-control-submit-button" id="submit-booking-form">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div> <!-- end of container -->
            </div> <!-- end of form-1 -->
            <!-- end of call me -->
        </div>
    </div>>
@endsection
