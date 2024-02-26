@extends('layouts.adminLte.layout')

@section('content')
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="card card-dark" style="width: 80%;">
                <div class="card-header">
                    <h2>View Bus Details</h2>
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="mb-3 form-group text-center mx-auto" style="max-width: 500px;">
                            <label for="view_date" class="form-label">Select a date to view bus records.</label>
                            <input type="date" class="form-control" id="view_date">
                        </div>
                    </form>
                    <div class="d-flex justify-content-center">
                        <div class="mb-3">
                            <label for="seatView" class="form-label text-center">Choose a Seat to view details</label><br>
                            <div class="seat-view d-block" id="seatView">
                                <div id="busDetails" data-bus-total-seats="{{ $total_seats }}" data-bus-id="{{ $busId }}"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
