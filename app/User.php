<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'img', 'contact_number',
        'house_number', 'street', 'barangay', 'province', 'city', 'zip_code', 'fb_link',
        'country', 'address', 'password', 'is_admin', 'is_active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * getFullName
     *
     * @return void
     */
    public function getFullName()
    {
        return ucwords($this->first_name . ' ' . $this->last_name);
    }

    public function checkIfIsActive($user)
    {
        if (!is_null($user->email_verified_at)) {
            echo "<span class='text-success'>active</span>";
        } else {
            echo "<span class='text-danger'>inactive</span>";
        }
    }

    public function checkIfIsAdmin($user)
    {
        if ($user->is_admin) {
            echo "<span class='text-success'>admin</span>";
        } else {
            echo "<span class='text-info'>client</span>";
        }
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
