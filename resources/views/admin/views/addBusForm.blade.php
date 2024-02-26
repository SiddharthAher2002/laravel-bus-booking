@extends('layouts.adminLte.layout')
@section('content')
    <div class="container mt-4 mb-4">
        <div class="card">
            <div class="card">
                <div class="card-header text-center text-light  bg-dark">
                    <h4 class="card-title">Add Bus!</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ isset($busData) ? route('admin.edit.post',['busId'=>$busData->id]) : route('admin.bus.post')}}">
                    @csrf
                        <div class="mb-3">
                            <label for="busName" class="form-label">Bus Name</label>
                            <input type="text" class="form-control" name ="busName" id="busName" placeholder="Enter bus name" value="{{ isset($busData) ? $busData->bus_name : '' }}">
                            @error('busName')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="busSource" class="form-label">Bus Source</label>
                            <input type="text" class="form-control" name = "busSource" id="busSource" placeholder="Enter bus source" value="{{ isset($busData) ? $busData->bus_source : '' }}">
                            @error('busSource')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="busDestination" class="form-label">Bus Destination</label>
                            <input type="text" class="form-control"  name="busDestination" id="busDestination"
                                placeholder="Enter bus destination" value="{{ isset($busData) ? $busData->bus_desti : '' }}">
                                @error('busDestination')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="fare" class="form-label">Fare (Price)</label>
                            <input type="number" class="form-control" name = "fare" id="fare" min="1" value="{{ isset($busData) ? $busData->bus_fare : '' }}">
                            @error('fare')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="distance" class="form-label">Distance</label>
                            <input type="number" class="form-control" name= "distance" id="distance" min="1" value="{{ isset($busData) ? $busData->bus_distance : '' }}">
                             @error('distance')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="travelTime" class="form-label">Travel Time</label>
                            <input type="number" class="form-control" name="travelTime" id="travelTime" placeholder="Enter travel time" value="{{ isset($busData) ? $busData->bus_travel_time : '' }}">
                            @error('travelTime')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                            
                        </div>
                        <div class="mb-3">
                            <label for="totalSeats" class="form-label">Total Seats</label>
                            <input type="number" class="form-control" name="totalSeats" id="totalSeats" min="1" value="{{ isset($busData) ? $busData->bus_total_seats : '' }}">
                            @error('totalSeats')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
