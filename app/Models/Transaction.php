<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BankDetail;
use App\Models\User;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['amount'];

    /* Relationship Function to retrieve related data from User model  */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bankDetail()
    {
        return $this->belongsTo(BankDetail::class, 'bank_id');
    }

}
