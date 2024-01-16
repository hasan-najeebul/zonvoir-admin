<?php
namespace App\Repositories;

use App\Models\Coupon;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StoreRepository
{
    protected $model;

    public function __construct(Store $model)
    {
        $this->model = $model;
    }
    public function list($id){
        $user = self::getAll($id);

        return (DataTables::eloquent($user))->filter( function($query){
            if(request()->get('search') && request()->get('search') != ''){
                $searchKeyword =  strtolower(request()->get('search'));
                $query->where(function($q) use ($searchKeyword) {
                    $q->where('name', 'LIKE', '%'.$searchKeyword.'%')
                    ->orWhere('street', 'LIKE', '%'.$searchKeyword.'%')
                    ->orWhere('town', 'LIKE', '%'.$searchKeyword.'%')
                    ->orWhere('description', 'LIKE', '%'.$searchKeyword.'%')
                    ->orWhere('status', 'LIKE', '%'.$searchKeyword.'%');
                 });
            }
            if(request()->get('status') && request()->get('status') != 'all'){
                $user_status = request()->get('status');
                $query->where('status', $user_status);
            }

        })
        ->rawColumns(['name','project_manager','status'])
        ->editColumn('name', function (Store $store) {
            return '<a href="'.route('store-management.store.show',$store->id).'" class="text-gray-600 text-hover-primary mb-1">'.$store->name.'</a>';
        })
        ->editColumn('project_manager', function (Store $store) {
            return '<a href="'.route('user-management.users.show',$store->user->id).'" class="text-gray-600 text-hover-primary mb-1">'.$store->user->name.'</a>';
        })
        ->editColumn('seller', function (Store $store) {
            return 0;
        })
        ->editColumn('mobile_number', function (Store $store) {
            return $store->mobile_number;
        })
        ->editColumn('status', function (Store $store) {
            $class = 'danger';
            if($store->status == 'active'){
                $class = 'success';
            }
            return '<div class="badge badge-light-'.$class.' fw-bolder">'.$store->status.'</div>';
        })

        ->editColumn('created_at', function (Store $store) {
            return $store->created_at->format('d M Y, h:i a');
        })
        ->addColumn('action', function (Store $store) {
            return view('admin.pages.store-management.columns._actions', compact('store'));
        })
        ->setRowId('id')
        ->make(true);
    }


    /**
     * getAll
     *
     * @param  mixed $partnerId
     * @return void
     */
    public static function getAll($partnerId){
        if($partnerId){
            return Store::where('partner_id', $partnerId);
        }
        return Store::query();
    }

    /**
     * getAllProducts
     *
     * @param  mixed $storeId
     * @return void
     */
    public static function getAllProducts($storeId){
        return Product::where('store_id', $storeId)->get();
    }
    /**
     * getAllCoupons
     *
     * @param  mixed $storeId
     * @return void
     */
    public static function getAllCoupons($storeId){
        return Coupon::where('store_id', $storeId)->get();
    }

    /**
     * getStoreAddress
     *
     * @param  mixed $store
     * @return void
     */
    public static function getStoreAddress($store){
        $address = '';
        if(isset($store)){
            $address .= $store->street.', ';
        }
        if(isset($store->town)){
            $address .= $store->town.', ';
        }
        if(isset($store->postal_code)){
            $address .= $store->postal_code;
        }
        return $address;

    }
}
