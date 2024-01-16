<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Generator $faker)
    {

        $demoUser = User::create([
            'name'              => $faker->name,
            'email'             => 'demo@demo.com',
            'password'          => Hash::make('demo'),
            'email_verified_at' => now(),
            'status'            => 'active',
            'created_at'        => now(),
            'updated_at'        => now(),
        ]);
        $demoUser->assignRole('Admin');
        $permissions = Permission::pluck('id')->all();
        $demoUser->syncPermissions($permissions);


        $subAdmin = User::create([
            'name'              => $faker->name,
            'email'             => $faker->unique()->safeEmail,
            'password'          => Hash::make('password'),
            'email_verified_at' => now(),
            'created_at'        => now(),
            'updated_at'        => now(),
        ]);
        $subAdmin->syncPermissions($permissions);
        $subAdmin->assignRole('Sub Admin');
        $subAdmin->revokePermissionTo(
            [
                'user-list',
                'user-create',
                'user-edit',

                'role-list',
                'role-delete',
                'role-view',
            ]);

            $partnerUser = User::create([
                'name'              => $faker->name,
                'email'             => $faker->unique()->safeEmail,
                'password'          => Hash::make('password'),
                'email_verified_at' => now(),
                'created_at'        => now(),
                'updated_at'        => now(),
            ]);
            $partnerUser->assignRole('Partner');
    }
}
