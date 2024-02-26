<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Bus;

class AdminController extends Controller
{
    public function showDashboard(){
        return view('admin.views.dashboard');
    }
    public function showRegForm()
    {
        return view('admin.views.addBusForm');
    }

    public function storeBusDetails(Request $request)
    {
        $validatedData = $request->validate([
            'busName' => 'required',
            'busSource' => 'required', 
            'busDestination' => 'required', 
            'fare' => 'required', 
            'distance' => 'required',
            'travelTime' => 'required', 
            'totalSeats' => 'required',
         ]);
         
        $insertBusDetails = Bus::insert([
            'bus_name' => $request->get('busName'),
            'bus_source' => $request->get('busSource'),
            'bus_desti' => $request->get('busDestination'),
            'bus_fare' => $request->get('fare'),
            'bus_distance' => $request->get('distance'),
            'bus_travel_time' => $request->get('travelTime'),
            'bus_total_seats' => $request->get('totalSeats')
        ]);
        if ($insertBusDetails) {
            session(['busAction' => '1']);
        }
        return redirect()->route('admin.show.buslist');
    }

    public function showBusList($searchTxt=null)
    {
        $bus = Bus::all();
        if ($searchTxt) {
            $bus = Bus::where('bus_name', 'LIKE', '%' . $searchTxt . '%')->paginate(5);
        } else {
            $bus = Bus::paginate(5);;
        }
        
        return view('admin.views.busGrid', ['buses' => $bus]);
    }

    public function showEditRecord($busId)
    {
        $busData = Bus::find($busId);
        return view('admin.views.addBusForm', ['busData' => $busData]);
    }
    public function updateEditRecord($busId, Request $request)
    {
        $busData = Bus::find($busId);

        $busData->bus_name = $request->get('busName');
        $busData->bus_source = $request->get('busSource');
        $busData->bus_desti = $request->get('busDestination');
        $busData->bus_fare = $request->get('fare');
        $busData->bus_distance = $request->get('distance');
        $busData->bus_travel_time = $request->get('travelTime');
        $busData->bus_total_seats = $request->get('totalSeats');

        if ($busData->save())
            session(['busAction' => '2']);
        return redirect()->route('admin.show.buslist');
    }

    public function deleteBusReord($busId)
    {
        $record = Bus::find($busId);
        if ($record->delete()) {
            return response()->json(['success' => true]);
        }
        return redirect()->route('admin.show.buslist');
    }
    public function updateActiveStatus($busId = null)
    {
        $record = Bus::find($busId);
        $curr_status = $record->is_active;
        $new_status = $curr_status ? "0" : "1";
        $updateData = [
            'is_active' => $new_status
        ];
        if ($record->update($updateData)) {
            return response()->json(['is_active' => $new_status]);
        }
        return redirect()->route('admin.show.buslist');
    }

    public function showViewBus($busId = null)
    {
        $bus = Bus::where('id', $busId)->first();
        $total_seats = $bus->bus_total_seats;
        return view('admin.views.viewBusBookings', ['total_seats' => $total_seats, 'busId' => $busId]);
    }

    public function viewBusDetails($busId = null, $date = null)
    {
        $bookings = Booking::where('booking_date', $date)->where('bus_id', $busId)->get();
        $seatDetails = [];
        $bus = Bus::find($busId);
        $totalSeats = $bus->bus_total_seats;


        $seats = range(1, $totalSeats);
        $seatDetails = array_fill_keys($seats, 0);

        foreach ($bookings as $booking) {
            $seatNumberArray = explode(",", $booking->seat_numbers);
            array_pop($seatNumberArray);


            foreach ($seatNumberArray as $bookedSeat) {
                $seatDetails[$bookedSeat] = $booking->cus_name;
            }
        }
        return response(['seatDetails' => $seatDetails, 'viewStatus' => 'Seat Booking']);
    }
}
