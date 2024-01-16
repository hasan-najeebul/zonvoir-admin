<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'dashboard-view',

            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'user-view',

            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'role-view',

            'permission-list',
            'permission-create',
            'permission-edit',
            'permission-delete',
            'permission-view',

            'affiliate-list',
            'affiliate-create',
            'affiliate-edit',
            'affiliate-delete',
            'affiliate-view',

            'partner-list',
            'partner-create',
            'partner-edit',
            'partner-delete',
            'partner-view',

            'store-list',
            'store-create',
            'store-edit',
            'store-delete',
            'store-view',

            'customer-list',
            'customer-create',
            'customer-edit',
            'customer-delete',
            'customer-view',

            'order-list',
            'order-create',
            'order-edit',
            'order-delete',
            'order-view',

            'product-list',
            'product-create',
            'product-edit',
            'product-delete',
            'product-view',

            'category-list',
            'category-create',
            'category-edit',
            'category-delete',
            'category-view',

            'coupons-list',
            'coupons-create',
            'coupons-edit',
            'coupons-delete',
            'coupons-view',

            'proforma-list',
            'proforma-create',
            'proforma-edit',
            'proforma-delete',
            'proforma-view',

            'invoice-list',
            'invoice-create',
            'invoice-edit',
            'invoice-delete',
            'invoice-view',

         ];

          // Looping and Inserting Array's Permissions into Permission Table
         foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
          }
    }
}
