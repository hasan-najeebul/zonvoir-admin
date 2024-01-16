<?php

namespace App\Http\Controllers\admin;

use App\DataTables\CategoriesDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    private CategoryRepository $categoryRepository;
    private CategoryService $categoryService;

    public function __construct(CategoryRepository $categoryRepository, CategoryService $categoryService)
    {
        $this->categoryRepository = $categoryRepository;
        $this->categoryService = $categoryService;
        $this->middleware(['permission:view-category|category-create|category-edit|category-delete'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:category-create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:category-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:category-delete'], ['only' => ['destroy']]);

    }
    /**
     * Display a listing of the resource.
     */
    public function index(CategoriesDataTable $dataTable)
    {
        return $dataTable->render('admin.pages.product-management.categories.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        $parentCategories = $this->categoryRepository->getParent($category);
        return view('admin.pages.product-management.categories.edit',['category'=> $category,'parentCategories'=> $parentCategories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {

        if ($request->hasFile('category_image')) {
            $categoryImage = $request->file('category_image')->store('category', 'public');
            $data['category_image'] = $categoryImage;
        }
        $this->categoryService->update($request->all(), $category);
        return response()->json(['status'=>'success']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
        } catch (\Throwable $th) {
            return response()->json(['status'=>'failed', 'message'=> $th->getMessage()]);
        }
        return response()->json(['status'=>'success']);
    }
}
