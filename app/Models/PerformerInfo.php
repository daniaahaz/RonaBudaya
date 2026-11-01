<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerformerInfo extends Model
{
    protected $table = 'PerformerInfo';
    protected $primaryKey = 'PerformerId';

    protected $fillable = [
        'PerformerName',
        'PerformanceType',
        'PerformanceDescription',
    ];

    public function events()
    {
        return $this->hasMany(
            Event::class,
            'PerformerId',
            'PerformerId'
        );
    }
}
