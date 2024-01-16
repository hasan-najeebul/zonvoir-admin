<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin          = Role::create(['name' => 'Admin']);
        $subadmin       = Role::create(['name' => 'Sub Admin']);
        $affiliate      = Role::create(['name' => 'Affiliate']);
        $partner        = Role::create(['name' => 'Partner']);
        $projectManager = Role::create(['name' => 'Project Manager']);
        $seller         = Role::create(['name' => 'Seller']);
        $customer       = Role::create(['name' => 'Customer']);

        $permissions = Permission::pluck('id')->all();
        $admin->syncPermissions($permissions);

    }
}
