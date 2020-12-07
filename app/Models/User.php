<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Authenticatable implements MustVerifyEmail, AuthenticatableContract, CanResetPasswordContract
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'profile_photo_path', 'account_balance'
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

    // get the values from the role field in the user Table
    public function isAdmin()
    {
        return $this->role ==='admin';
    }

    public function isUser()
    {
        return $this->role ==='user';
    }

    /* Relationship Function to retrieve data from bank details model  */
    public function bankDetails()
    {
        return $this->hasMany(BankDetail::class);
    }

    /* Relationship Function to retrieve data from transactions model  */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
