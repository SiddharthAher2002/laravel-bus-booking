<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bus;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.home-page');
    }
    
    public function showBookingForm()
    {
        $buses = Bus::all();
        return view ('frontend.views.book-bus', ['buses' => $buses]);
    }
    public function postBookingForm(Request $request)
    {
        $booking = new Booking();

        $booking->cus_id = Auth::user()->id;
        $booking->cus_name = $request->post('cus_name');
        $booking->booking_date = $request->post('booking_date');
        $booking->bus_id = $request->post('bus_id');

        $seat_Arr = $request->post('seats');
        $seatString = implode(',', $seat_Arr). ',';

        $booking->seat_numbers = $seatString;
        if ($booking->save())
            return $seatString;
    }
    public function retrieveBookingDetails($date = null)
    {
        $bookingDetails = [];

        $buses = Booking::select('bus_id')
            ->where('booking_date', $date)
            ->groupBy('bus_id')
            ->get();

        foreach ($buses as $bus) {

            $buses_bookings_seats = Booking::select('seat_numbers', 'cus_id')
                ->where('bus_id', $bus->bus_id)
                ->where('booking_date',$date)
                ->get();

            $allSeats = range(1, 40); 
            $seatStatus = array_fill_keys($allSeats, 0);

            foreach ($buses_bookings_seats as $bus_booking_seat) {
                $seatStr = $bus_booking_seat->seat_numbers;

                $seatArr = explode(",", $seatStr);
                array_pop($seatArr); 
                foreach ($seatArr as $seatNumber) {

                    $current_loggedIn = Auth::user()->id;
                    $cusId = $bus_booking_seat->cus_id;
                    if ($cusId == $current_loggedIn) {
                        $seatStatus[$seatNumber] = 1; 
                    } elseif ($cusId != null) {
                        $seatStatus[$seatNumber] = 2; 
                    }
                }
            }

            $bookingDetails[$bus->bus_id] = $seatStatus;
        }

        $busActiveStatus = [];
        $buses = Bus::get();
        foreach($buses as $bus){
            $busActiveStatus[$bus->id]=$bus->is_active;
        }

        return response(['bookingDetails' => $bookingDetails,'busActiveStatus'=>$busActiveStatus]);
    }

    // Bus Registeration

    public function showBusRegPage()
    {
       return view('frontend.views.bus-reg');
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
          session(['busAdded'=> '1']);
       }
       return view('frontend.home-page');
    }

    public function getAvailableBuses($from=null,$to=null){
        $availableBuses = Bus::select('id')
                            ->where('bus_source',$from)
                            ->where('bus_desti',$to)
                            ->get();

        $buses = Bus::all();

        return response(["availableBuses"=>$availableBuses,"buses"=>$buses]);
    }
}
