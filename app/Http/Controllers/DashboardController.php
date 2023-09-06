<?php

namespace App\Http\Controllers;

use App\Models\Booking;

class DashboardController extends Controller
{
    public function index()
    {
        $revenueDay = $this->getRevenueForPeriod(now()->subDay(), now());

        $revenueWeek = $this->getRevenueForPeriod(now()->subWeek(), now());

        $revenueMonth = $this->getRevenueForPeriod(now()->subMonth(), now());

        $upcomingReservations = Booking::whereBetween('check_in_date', [now(), now()->addDays(30)])
            ->orderBy('check_in_date', 'asc')
            ->get();

        return view('dashboard.index', compact('revenueDay', 'revenueWeek', 'revenueMonth', 'upcomingReservations'));
    }

    private function getRevenueForPeriod($start, $end)
    {
        return Booking::whereBetween('created_at', [$start, $end])
            ->sum('total_price');
    }
}