<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Store extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'logo',
        'name',
        'number',
        'street',
        'town',
        'postal_code',
        'mobile_number',
        'partner_id',
        'description',
        'status',
    ];

    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class,'partner_id','id');
    }

    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function coupon(): HasMany
    {
        return $this->hasMany(Coupon::class);
    }


    public function getStoreLogo(){
        return asset('public/storage/'.$this->logo ?? '');
    }

}
