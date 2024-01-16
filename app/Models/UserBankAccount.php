<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBankAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'bank_name', 'account_number',
        // Add other columns as needed
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
