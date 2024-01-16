<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;

class AffiliateUserService {
    /**
     * update
     *
     * @return void
     */
    public static function update( array $data, $user){

        return $user->update($data);

    }
}
