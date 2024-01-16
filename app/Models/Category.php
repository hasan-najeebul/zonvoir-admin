<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'description','category_image','parent'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_categories');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'project_manager_id','id');
    }
    /**
     * productImagePath
     *
     * @return void
     */
    public function categoryImage()
    {
        return asset('public/storage/' . $this->category_image ?? '');
    }
}