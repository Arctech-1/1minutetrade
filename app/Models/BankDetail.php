<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankDetail extends Model
{
    use HasFactory;

     /* Relationship Function to retrieve related data from User model  */
     public function user()
     {
         return $this->belongsTo(User::class);
     }

     public function transactions()
     {
         return $this->hasMany(Transaction::class, 'bank_id');
     }
}
