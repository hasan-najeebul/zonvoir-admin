<?php

namespace App\Services;

use App\Models\Category;
use App\Models\ProductGallery;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryService
{
    public function update(array $data,Category $category)
    {
        return $category->update($data);
    }
}
