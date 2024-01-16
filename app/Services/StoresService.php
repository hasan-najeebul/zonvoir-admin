<?php
namespace App\Services;

use App\Models\Store;
use App\Models\User;
use App\Repositories\ProjectManagerRepository;
use App\Repositories\SellerRepository;
use App\Repositories\StoreRepository;
use Illuminate\Http\Request;

class StoresService {
    /**
     *
     *
     * @param  mixed $data
     * @return void
     */
    public static function getAll(Store $store) {

        $products   = StoreRepository::getAllProducts($store->id);
        $coupons    = StoreRepository::getAllCoupons($store->id);
        $seller     = SellerRepository::storeSellers($store->id)->get();
        $manager    = ProjectManagerRepository::storeManagers($store->id)->get();
        return ['store' => $store, 'products'=> $products,'coupons' => $coupons,'seller'=>$seller, 'manager'=>$manager];
    }

    public static function update(array $data, Store $store){
        return $store->update($data);
    }
}
