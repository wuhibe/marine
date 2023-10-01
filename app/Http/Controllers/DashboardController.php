<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Reservation;

class DashboardController extends Controller
{
    public function index()
    {
        $revenueDay = $this->getRevenueForPeriod(now()->subDay(), now());

        $revenueWeek = $this->getRevenueForPeriod(now()->subWeek(), now());

        $revenueMonth = $this->getRevenueForPeriod(now()->subMonth(), now());

        $upcomingReservations = Reservation::whereBetween('check_in_date', [now(), now()->addDays(30)])
            ->leftJoin('customers', 'customers.id', 'reservations.customer_id')
            ->orderBy('customers.first_name', 'asc')
            ->get();

        return view('dashboard.index', compact('revenueDay', 'revenueWeek', 'revenueMonth', 'upcomingReservations'));
    }

    public function revenueByRoom()
    {
        $revenueDay = $this->getRevenueByRoom(now()->subDay(), now());

        $revenueWeek = $this->getRevenueByRoom(now()->subWeek(), now());

        $revenueMonth = $this->getRevenueByRoom(now()->subMonth(), now());

        return view('dashboard.details', compact('revenueDay', 'revenueWeek', 'revenueMonth'));
    }

    private function getRevenueForPeriod($start, $end)
    {
        return Booking::whereBetween('created_at', [$start, $end])
            ->sum('total_price');
    }

    private function getRevenueByRoom($start, $end)
    {
        return Booking::whereBetween('bookings.check_in_date', [$start, $end])
            ->leftjoin('rooms', 'bookings.room_id', 'rooms.id')
            ->selectRaw('rooms.room_number, rooms.price_per_night, room_id, sum(total_price) as price')
            ->groupBy('rooms.id', 'bookings.room_id', 'rooms.room_number', 'rooms.price_per_night')
            ->orderBy('price', 'desc')
            ->get()->toArray();
    }
}