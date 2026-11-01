<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'booking';
    protected $primaryKey = 'BookingId';

    protected $fillable = [
        'UserId',
        'EventId',
        'BookingDate',
        'BookingNumOfTicket',
        'BookingStatus',
        'BookingCreatedTime',
        'BookingStatusTime',
    ];

    public function user()
    {
        return $this->belongsTo(
            UserInfo::class,
            'UserId',
            'UserId'
        );
    }


    public function event()
    {
        return $this->belongsTo(
            Event::class,
            'EventId',
            'EventId'
        );
    }
}
