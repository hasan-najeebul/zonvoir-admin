<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AffiliateUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'commission','description','affiliate_code','affiliate_link', 'affiliate_website_link',
    ];


    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
