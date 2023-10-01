<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Room;
use App\Models\Customer;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::orderBy('id', 'desc')->paginate(6);
        return view('bookings.index', compact('bookings'));
    }

    public function create()
    {
        $futureBookingRooms = Booking::where('check_out_date', '>=', now())->pluck('room_id');
        $rooms = Room::where('availability', 'AVAILABLE')->whereNotIn('id', $futureBookingRooms)->get();
        $customers = Customer::all();
        return view('bookings.create', compact('rooms', 'customers'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'room_id' => 'required|exists:rooms,id',
            'customer_id' => 'required|exists:customers,id',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
            'total_price' => 'required|numeric',
            'payment_method' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->route('bookings.create')
                ->withErrors($validator)
                ->withInput();
        }

        $request->merge(['user_id' => auth('admin')->user()->id]);
        Booking::create($request->all());

        return redirect()->route('bookings.index')->with('success', 'Booking created successfully.');
    }

    public function show(Booking $booking)
    {
        return view('bookings.show', compact('booking'));
    }

    public function edit(Booking $booking)
    {
        $rooms = Room::where('availability', 'AVAILABLE')->get();
        $customers = Customer::all();
        return view('bookings.edit', compact('booking', 'rooms', 'customers'));
    }

    public function update(Request $request, Booking $booking)
    {
        $validator = Validator::make($request->all(), [
            'room_id' => 'required|exists:rooms,id',
            'customer_id' => 'required|exists:customers,id',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
            'total_price' => 'required|numeric',
            'payment_method' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->route('bookings.edit', $booking->id)
                ->withErrors($validator)
                ->withInput();
        }

        $booking->update($request->all());

        return redirect()->route('bookings.index')->with('success', 'Booking updated successfully.');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('bookings.index')->with('success', 'Booking deleted successfully.');
    }
}