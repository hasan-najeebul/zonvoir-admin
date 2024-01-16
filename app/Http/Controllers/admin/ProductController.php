<?php

namespace App\Http\Controllers\admin;

use App\DataTables\ProductsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use App\Repositories\ProductRepository;
use App\Services\PartnerService;
use App\Services\ProductService;
use App\Services\StoresService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private ProductRepository $productRepository;
    private ProductService $productService;

    public function __construct(ProductRepository $productRepository, ProductService $productService)
    {
        $this->productRepository = $productRepository;
        $this->productService = $productService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->productRepository->list();
        }

        return view('admin.pages.product-management.products.list');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        //$categories =
        return view('admin.pages.product-management.products.edit',['product'=> $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, string $id)
    {
        $product    = Product::find($id);
            $this->productService->update($request->except('_token', '_method','avatar_remove','product_image'),$product);
        if ($request->hasFile('product_image')) {
            $productImage = $this->productService->uplaodProductGallery($product->id);
        }
        return response()->json(['status'=>'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            $product->update(['status'=>'deleted']);
        } catch (\Throwable $th) {
            return response()->json(['status'=>'failed', 'message'=> $th->getMessage()]);
        }
        return response()->json(['status'=>'success']);
    }

    public function getPartnerProducts(Request $request, $partnerId){
        $user = User::findOrFail($partnerId);
        if(!$user){
            abort(403);
        }
        if($request->ajax()){
            return $this->productRepository->list($partnerId);
        }
        if($user){
            $data = PartnerService::getAll($user);
            return view('admin.pages.user-management.partner-users.sections.product-list',$data);
        }

    }

    public function getStoreProducts(Request $request, $storeId){
        $store = Store::findOrFail($storeId);
        if(!$store){
            abort(403);
        }
        if($request->ajax()){
            return $this->productRepository->list($storeId,'store');
        }
        if($store){
            $data = StoresService::getAll($store);
            return view('admin.pages.store-management.store.sections.product-list',$data);
        }
    }
}
