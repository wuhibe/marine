<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        if (auth('admin')->user()->user_type == 'admin')
            $rooms = Room::paginate(6);
        else
            $rooms = Room::where('availability', 'AVAILABLE')->paginate(6);
        return view('rooms.index', compact('rooms'));
    }

    public function create()
    {
        return view('rooms.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'capacity' => 'required|numeric',
            'room_number' => 'required|unique:rooms,room_number',
            'room_type' => 'required|in:standard,double,family',
            'price_per_night' => 'required|numeric',
        ]);

        Room::create($request->all());
        return redirect()->route('rooms.index')->with('success', 'Room created successfully.');
    }

    public function show(Room $room)
    {
        return view('rooms.show', compact('room'));
    }

    public function edit(Room $room)
    {
        return view('rooms.edit', compact('room'));
    }

    public function update(Request $request, Room $room)
    {
        $request->validate([
            'capacity' => 'required|numeric',
            'room_number' => 'required|unique:rooms,room_number,' . $room->id,
            'room_type' => 'required|in:standard,double,family',
            'price_per_night' => 'required|numeric',
        ]);

        $room->update($request->all());
        return redirect()->route('rooms.index')->with('success', 'Room updated successfully.');
    }

    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('rooms.index')->with('success', 'Room deleted successfully.');
    }

    public function availability(Request $request)
    {
        $room = Room::find($request->id);
        $room->availability = $request->availability;
        $room->save();
        return redirect()->route('rooms.index')->with('success', 'Availability change successfully.');
    }
}
