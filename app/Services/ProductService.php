<?php

namespace App\Services;

use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\User;
use Illuminate\Http\Request;

class ProductService
{
    public function update(array $data,Product $product)
    {
        return $product->update($data);
    }

    public function uplaodProductGallery($product_id)
    {
        $title = request()->file('product_image')->getClientOriginalName();
        $productImage = request()->file('product_image')->store('produts/'.request()->store_id, 'public');
        return ProductGallery::create([
            'title' => $title,
            'path' => $productImage,
            'product_id' => $product_id,
            'user_id' => auth()->user()->id,
            'is_featured' => '1',
        ]);
    }
}
