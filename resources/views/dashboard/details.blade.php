@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Back button -->
        <div class="d-flex justify-content-start">
            <a href="{{ route('dashboard') }}" class="mr-2 mb-2">
                <i class="fas fa-chevron-left"></i> Back
            </a>
        </div>
        <h2>Daily Revenue</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Room Number</th>
                    <th>Price Per Night</th>
                    <th>Total Price (Daily)</th>
                </tr>
            </thead>
            <tbody>
                @if(count($revenueDay) > 0)
                    @foreach($revenueDay as $room)
                        <tr>
                            <td>{{ $room['room_number'] }}</td>
                            <td>{{ $room['price_per_night'] }} Br.</td>
                            <td>{{ $room['price'] }} Br.</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan=3 class="text-center"> No Data for Day</td>
                    </tr>
                @endif
            </tbody>
        </table>
<hr/>
<br/>
        <h2>Weekly Revenue</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Room Number</th>
                    <th>Price Per Night</th>
                    <th>Total Price (Weekly)</th>
                </tr>
            </thead>
            <tbody>
                @if(count($revenueWeek) > 0)
                    @foreach($revenueWeek as $room)
                        <tr>
                            <td>{{ $room['room_number'] }}</td>
                            <td>{{ $room['price_per_night'] }} Br.</td>
                            <td>{{ $room['price'] }} Br.</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan=3 class="text-center"> No Data for Week</td>
                    </tr>
                @endif
            </tbody>
        </table>
<hr/>
<br/>

        <h2>Monthly Revenue</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Room Number</th>
                    <th>Price Per Night</th>
                    <th>Total Price (Monthly)</th>
                </tr>
            </thead>
            <tbody>
                @if(count($revenueMonth) > 0)
                    @foreach($revenueMonth as $room)
                        <tr>
                            <td>{{ $room['room_number'] }}</td>
                            <td>{{ $room['price_per_night'] }} Br.</td>
                            <td>{{ $room['price'] }} Br.</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan=3 class="text-center"> No Data for Month</td>
                    </tr>
                @endif
            </tbody>
        </table>
<hr/>
<br/>
    </div>
@endsection
