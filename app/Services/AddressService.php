<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;

class AddressService {

    public static function userAddress($user){
        return $user->address()->updateOrCreate(
            [],
            ['street' => request()->input('street'),'house_no' => request()->input('house_no'),'city' => request()->input('city'),'postal_code' => request()->input('postal_code')]
        );
    }

}
