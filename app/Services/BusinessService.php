<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;

class BusinessService {

    public static function userBusiness($user){

        return $user->userBusiness()->updateOrCreate(
            [],
            ['business_name' => request()->input('business_name'),'industry' => request()->input('industry'),'description' => request()->input('description'),'website' => request()->input('website')]
        );
    }

}
