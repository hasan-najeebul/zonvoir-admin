<?php
namespace App\Repositories;

use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProductRepository
{
    public static function list($id = '', $type= 'partner'){
        $product = self::getAll($id, $type);

        return (DataTables::eloquent($product))->filter( function($query){

            if(request()->get('search_key') || request()->get('search_key') != ''){

                $searchKeyword =  strtolower(request()->get('search_key'));
                $query->where(function($q) use ($searchKeyword) {
                    $q->where('name', 'LIKE', '%'.$searchKeyword.'%')
                    ->orWhere('status', 'LIKE', '%'.$searchKeyword.'%');
                 });
            }
            if(request()->get('status') && request()->get('status') != 'all'){
                $status = request()->get('status');
                $query->where('status', $status);
            }
        })
        ->rawColumns(['name','created_by','status'])
        ->editColumn('name', function (Product $product) {
            return view('admin.pages.product-management.products.columns._product', compact('product'));
        })
        ->editColumn('sku', function (Product $product) {
            return $product->sku;
        })
        ->editColumn('qty', function (Product $product) {
            return $product->quantity;
        })
        ->editColumn('points', function (Product $product) {
            return $product->points;
        })
        ->editColumn('created_at', function (Product $product) {
            return $product->created_at->format('d M Y, h:i a');
        })
        ->addColumn('created_by', function (Product $product) {
            return '<a href="'.route('user-management.users.show',$product->created_by).'">'.$product->user->name.'</a>';
        })
        ->editColumn('status', function (Product $product) {
            return sprintf('<div class="badge badge-light-%s fw-bolder">%s</div>',getStatusClass($product->status), $product->status ? $product->status : '');
        })
        ->addColumn('action', function (Product $product) {
            return view('admin.pages.product-management.products.columns._actions', compact('product'));
        })
        ->setRowId('id')
        ->make(true);
    }

    public static function getAll($id,$type = 'partner'){
        if($id && $type == 'partner'){
            return Product::where('created_by',$id);
        }
        if($id && $type == 'store'){
            return Product::where('store_id',$id);
        }
        return Product::query();
    }
}
