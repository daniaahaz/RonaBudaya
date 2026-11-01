<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ContactMessage extends Model
{
    protected $table = 'contact_messages';

    protected $primaryKey = 'ContactId';

    protected $fillable = [
        'UserId',
        'ContactName',
        'ContactEmail',
        'ContactSubject',
        'ContactMessage'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(UserInfo::class, 'UserId', 'UserId');
    }
}