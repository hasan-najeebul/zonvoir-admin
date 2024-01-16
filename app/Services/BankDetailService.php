<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;

class BankDetailService {


      /**
     * setBankDetails
     *
     * @param  mixed $request
     * @param  mixed $user
     * @return void
     */
    public static function setBankDetails($user){
        return $user->bankDetails()->updateOrCreate(
            [],
            ['bank_name' => request()->input('bank_name'),'account_number' => request()->input('account_number')]
        );
    }
}
