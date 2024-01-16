<?php
namespace App\Repositories;

use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CategoryRepository
{
    protected $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }
    public function getParent($category){
        return $this->model->where('parent','!=', 0)->where('project_manager_id',$category->project_manager_id)->get();
    }
}
