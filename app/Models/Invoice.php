<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'duedate' => 'date',
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
