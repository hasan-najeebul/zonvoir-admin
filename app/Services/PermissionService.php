<?php

namespace App\Services;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;
class PermissionService
{
    protected $model;
    public function __construct(Permission $model)
    {
        $this->model = $model;
    }


    public static function store( array $data){
        return Permission::create($data);
    }

    public static function update( array $data, Permission $permission){
        return $permission->update($data);
    }
    public static function delete(Permission $permission){
        return $permission->delete();
    }

    public static function getPermissionByGroup(){
        $permissions = Permission::all();
        // Create an array of permissions grouped by ability.
        $permissions_by_group = [];
        foreach ($permissions ?? [] as $permission) {
            $ability = Str::before($permission->name, '-');

            $permissions_by_group[$ability][] = $permission;
        }
        return $permissions_by_group;
    }
}
