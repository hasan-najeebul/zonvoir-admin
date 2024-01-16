<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo    ;

class RedeemedReward extends Model
{
    use HasFactory;
    /**
     * Get all of the comments for the RedeemedReward
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function user(): belongsTo
    {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }
}
