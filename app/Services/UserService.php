<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;

class UserService {
    /**
     * createAffiliateUser
     *
     * @param  mixed $data
     * @return void
     */
    public static function store(array $data, $userRole = 'Affiliate') {
        $user =  User::create($data);
        $user->assignRole($userRole);
        return $user;
    }
    /**
     * update
     *
     * @param  mixed $data
     * @param  mixed $user
     * @return void
     */
    public static function update( array $data, $user){
        if (request()->hasFile('profile_photo_url')) {
            $path = $user->uploadProfilePic(request()->file('profile_photo_url'));
            $data['profile_photo_url'] = $path;
        }
        if($user->update($data)){
            return $user;
        }
    }

    /**
     * delete
     *
     * @param  mixed $user
     * @return void
     */
    public static function delete($user){
        return $user->update(['status'=>'deleted']);
    }


     /**
     * delete
     *
     * @param  mixed $user
     * @return void
     */
    public static function updateStatus($user){
        return $user->update(['status'=>'active']);
    }


}
