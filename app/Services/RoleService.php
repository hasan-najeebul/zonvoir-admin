<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleService {
    /**
     * createAffiliateUser
     *
     * @param  mixed $data
     * @return void
     */
    public static function store(array $data) {
        return Role::create($data);
    }

    /**
     * update
     *
     * @param  mixed $data
     * @param  mixed $role
     * @return void
     */
    public static function update(array $data, Role $role) {
        return $role->update($data);
    }
    public static function delete(Role $role) {
        return $role->delete();
    }

}
