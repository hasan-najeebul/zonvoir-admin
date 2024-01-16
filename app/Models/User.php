<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'profile_photo_url',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    /**
     * Get the user associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function address(): hasOne
    {
        return $this->hasOne(UserAddress::class);
    }

    /**
     * Get the user associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function bankDetails(): hasOne
    {
        return $this->hasOne(UserBankAccount::class);
    }

    /**
     * Get the user associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function userBusiness(): hasOne
    {
        return $this->hasOne(UserBusiness::class);
    }
    /**
     * Get the user associated with the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function affiliate(): hasOne
    {
        return $this->hasOne(AffiliateUser::class);
    }
    /**
     * stores
     *
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function store(): HasMany
    {
        return $this->hasMany(Store::class,'partner_id','id');
    }

    /**
     * stores
     *
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function stores(): hasMany
    {
        return $this->hasMany(Store::class,'partner_id','id');
    }

    /**
     * orders
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders(): hasMany
    {
        return $this->hasMany(Order::class,'customer_id','id');
    }

    /**
     * products
     * Get all of the comments for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function products(): hasMany
    {
        return $this->hasMany(Product::class);
    }

    /**
     * invoices
     *
     *  @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function invoices(): hasMany
    {
        return $this->hasMany(Invoice::class,'partner_id','id');
    }

    /**
     * proforma
     *
     * Get all of the proforma for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function proforma(): HasMany
    {
        return $this->hasMany(Proforma::class,'partner_id','id');
    }

    /**
     * Get all of the loyalty card for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function loyaltyCard(): HasMany
    {
        return $this->hasMany(LoyaltyCard::class, 'customer_id','id');
    }

    /**
     * Get all of the customer points for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function customerPoint(): HasOne
    {
        return $this->hasOne(CustomerPoint::class, 'customer_id','id');
    }



    /**
     * getAffiliateCode
     *
     * @param  mixed $user
     * @return void
     */
    public function getAffiliateCode()
    {

        if(!isset($this->affiliate->affiliate_code)){
            return 'AFL-'.$this->id.Str::random(5);
        }
        return $this->affiliate->affiliate_code;

    }
    /**
     * getAffiliateLink
     *
     * @return string
     */
    public function getAffiliateLink()
    {
        $affiliateCode = $this->getAffiliateCode();
        return url('/').'/'.$affiliateCode;
    }


    /**
     * uploadProfilePic
     *
     * @param  mixed $file
     * @return string
     */
    public function uploadProfilePic($file)
    {
        $path = $file->storeAs('profile_photos', "user_{$this->id}.{$file->extension()}", 'public');
        return $path;
    }

    /**
     * getProfilePicPath
     *
     * @return path
     */
    public function getProfilePicPath()
    {
        return asset('public/storage/'.$this->profile_photo_url ?? '');
    }

    /**
     * setAddress
     *
     * @return array
     */
    public function setAddress(){
        return ['street' => request()->input('street'),'house_no' => request()->input('house_no'),'city' => request()->input('city'),'zip_code' => request()->input('zipcode')];
    }

}
