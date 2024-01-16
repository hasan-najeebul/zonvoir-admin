<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBusiness extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'business_name', 'industry', 'description','website'
        // Add other columns as needed
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
