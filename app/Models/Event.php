<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PerformerInfo;

class Event extends Model
{
    protected $table = 'Events';

    protected $primaryKey = 'EventId';

    protected $fillable = [
        'EventName',
        'LocationName',
        'LocationState',
        'LocationAddress',
        'PerformerId',
        'EventDate',
        'EventTime',
        'EventDescription',
    ];

    public function performer()
    {
        return $this->belongsTo(
            PerformerInfo::class,
            'PerformerId',
            'PerformerId'
        );
    }

    public function bookings()
    {
        return $this->hasMany(
            Booking::class,
            'EventId',
            'EventId'
        );
    }

}
