<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description','points','quantity','weight', 'sku','barcode','backorder','status',
    ];

    /**
     * categories
     *
     * @return void
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories');
    }

    /**
     * galleries
     *
     * @return void
     */
    public function galleries()
    {
        return $this->hasMany(ProductGallery::class,'product_id','id');
    }

    /**
     * user
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class,'created_by','id');
    }

    /**
     * productImagePath
     *
     * @return void
     */
    public function imagePath($path)
    {
        return asset('public/storage/' . $path ?? '');
    }

    /**
     * featuredImage
     *
     * @return void
     */

     public function featuredImage()
     {
        return $this->galleries()->where('is_featured', '1')->first();
     }
}
