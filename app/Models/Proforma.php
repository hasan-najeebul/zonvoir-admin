<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proforma extends Model
{
    use HasFactory;

    protected $casts = [
        'expirydate' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'partner_id','id');
    }

    public function getIdAttribute()
    {
        // Customize the prefix as needed
        $prefix = $this->attributes['prefix'].'-';

        // Combine the prefix with the actual invoice number
        return $prefix . $this->attributes['id'];
    }
}
