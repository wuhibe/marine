<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\Customer;
use Illuminate\Support\Facades\Validator;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::orderBy('id', 'desc')->paginate(6);
        return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        $rooms = Room::where('availability', 'AVAILABLE')->get();
        $customers = Customer::all();
        return view('reservations.create', compact('rooms', 'customers'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'room_id' => 'required|exists:rooms,id',
            'customer_id' => 'required|exists:customers,id',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
            'total_price' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->route('reservations.create')
                ->withErrors($validator)
                ->withInput();
        }
        $request->merge(['status' => 'PENDING']);
        $request->merge(['user_id' => auth('admin')->user()->id]);
        Reservation::create($request->all());

        return redirect()->route('reservations.index')->with('success', 'Reservation created successfully.');
    }

    public function show(Reservation $reservation)
    {
        return view('reservations.show', compact('reservation'));
    }

    public function edit(Reservation $reservation)
    {
        $rooms = Room::where('availability', 'AVAILABLE')->get();
        $customers = Customer::all();
        return view('reservations.edit', compact('reservation', 'rooms', 'customers'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        $validator = Validator::make($request->all(), [
            'room_id' => 'required|exists:rooms,id',
            'customer_id' => 'required|exists:customers,id',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
            'total_price' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->route('reservations.edit', $reservation->id)
                ->withErrors($validator)
                ->withInput();
        }

        $reservation->update($request->all());

        return redirect()->route('reservations.index')->with('success', 'Reservation updated successfully.');
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect()->route('reservations.index')->with('success', 'Reservation deleted successfully.');
    }
}