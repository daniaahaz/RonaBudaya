<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Passwords\CanResetPassword as CanResetPasswordTrait;

class UserInfo extends Authenticatable
{
    use HasFactory, Notifiable, CanResetPasswordTrait;
    

    protected $table = 'userinfo';

    protected $primaryKey = 'UserId';

    protected $fillable = [
        'UserName',
        'UserEmail',
        'UserPassword',
        'UserRole',
    ];

    protected $hidden = [
        'UserPassword',
    ];

    public function getAuthPassword()
    {
        return $this->UserPassword;
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(
            Booking::class,
            'UserId',
            'UserId'
        );
    }

    public function getEmailForPasswordReset()
    {
        return $this->UserEmail;
    }

    public function routeNotificationForMail($notification = null)
    {
        return $this->UserEmail;
    }
}
