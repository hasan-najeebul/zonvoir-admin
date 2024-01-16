<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGallery extends Model
{
    use HasFactory;
    protected $table    = 'product_gallery';
    protected $fillable = [
        'title', 'path', 'product_id', 'user_id', 'is_featured'
    ];
    // Assume there is a 'product_id' foreign key column in the product_images table
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }


}
