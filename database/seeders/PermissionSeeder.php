<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define permissions for Super Admin
        Permission::create(['name' => 'create admins']);
        Permission::create(['name' => 'assign permissions']);

        // Define permissions for Super Admin and Admin
        Permission::create(['name' => 'manage products']);
        Permission::create(['name' => 'manage categories']);

        $role = Role::where('name','admin')->first();
        $role->syncPermissions(['manage products', 'manage categories']);


    }
}
