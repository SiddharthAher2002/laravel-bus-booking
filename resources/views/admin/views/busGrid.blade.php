@extends('layouts.adminLte.layout')

@if (session('busAction') == '1')
    <script>
        alert("Record Added Successfully")
    </script>
@elseif(session('busAction') == '2')
    <script>
        alert("Record Updated Successfully")
    </script>
@endif
{{ session()->forget('busAction') }}

@section('content')
    <div class="container mt-4" style="">
        <div class="header text-center text-dark">
            <h2>Bus Listing</h2>
        </div>
        <div class="d-flex justify-content-between mb-2">
            <div class="d-flex">
                <input type="text" class="form-control" placeholder="Search By Title" name="searchInput" id="searchInput">
                
            </div>
            <div class="mr-3">
                <a href="{{ route('admin.bus.add') }}" type="button" class="btn btn-outline-primary">Add New</a>
            </div>
        </div>

        <div class="justify-content-center card">
            <form method="POST">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="align-middle" scope="col">Sr No</th>
                            <th class="align-middle" scope="col">Name</th>
                            <th class="align-middle" scope="col">Source</th>
                            <th class="align-middle" scope="col">Destination</th>
                            <th class="align-middle" scope="col">Fare</th>
                            <th class="align-middle" scope="col">Distane</th>
                            <th class="align-middle" scope="col">Travel Time</th>
                            <th class="align-middle" scope="col">Total Seats</th>
                            <th class="align-middle" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="listContainer" id="listContainer">
                        @foreach ($buses as $row)
                            <tr class="record-container search-result-row">
                                <td>{{ $row['id'] }}</td>
                                <td>{{ $row['bus_name'] }}</td>
                                <td>{{ $row['bus_source'] }}</td>
                                <td>{{ $row['bus_desti'] }}</td>
                                <td>{{ $row['bus_fare'] }}</td>
                                <td>{{ $row['bus_distance'] }}</td>
                                <td>{{ $row['bus_travel_time'] }}</td>
                                <td>{{ $row['bus_total_seats'] }}</td>
                                <td>
                                    <a href="{{ route('admin.edit.bus', ['busId' => $row['id']]) }}"
                                        class="btn btn-outline-info" name="update-btn">Edit</a>
                                    <a class="btn btn-outline-danger deleteBtn" data-bus-id="{{ $row['id'] }}"
                                        name="delete-btn">Delete</a>

                                    <a href="{{ route('admin.view.bus',['busId'=>$row['id']])}}" class="btn btn-outline-secondary viewBtm" data-bus-id="{{ $row['id'] }}"
                                        name="view-btn">View</a>

                                    <a data-bus-id="{{ $row['id'] }}"
                                        class="toggle-btn btn {{ $row['is_active'] ? 'btn-success' : 'btn-danger' }} activeBtn"
                                        name="active-btn">
                                        {{ $row['is_active'] ? 'Active' : 'Inactive' }}
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$buses->links()}}
            </form>
        </div>
    </div>
    </div>
@endsection
