<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;

class AffiliateCommissionService {


    /**
     * setCommission
     *
     * @param  mixed $request
     * @param  mixed $user
     * @return void
     */
    public static function setCommission($user){
        return $user->affiliate()->updateOrCreate(
            [],
            ['user_id' => $user->id,'commission' => request()->input('commission'),'description'=>request()->input('description'),'affiliate_code' => $user->getAffiliateCode(),'affiliate_link'=> $user->getAffiliateLink(),'affiliate_website_link'=>request()->input('website')]
        );
    }

}
