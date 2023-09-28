<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'avatar',
        'id_photo',
        'creator_id',
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function fullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
