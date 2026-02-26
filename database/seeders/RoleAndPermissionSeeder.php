<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'Admin']);
        $user = Role::create(['name' => 'User']);

        $categorylist = Permission::create(['name' => 'categorylist']);
        $categoryCreate = Permission::create(['name' => 'categoryCreate']);
        $categoryUpdate = Permission::create(['name' => 'categoryUpdate']);
        $categoryDelete = Permission::create(['name' => 'categoryDelete']);

        $productlist = Permission::create(['name' => 'productlist']);
        $productCreate = Permission::create(['name' => 'productCreate']);
        $productUpdate = Permission::create(['name' => 'productUpdate']);
        $productDelete = Permission::create(['name' => 'productDelete']);

        $userlist = Permission::create(['name' => 'userlist']);
        $userCreate = Permission::create(['name' => 'userCreate']);
        $userUpdate = Permission::create(['name' => 'userUpdate']);
        $userDelete = Permission::create(['name' => 'userDelete']);

        $permissionlist = Permission::create(['name' => 'permissionlist']);
        $permissionCreate = Permission::create(['name' => 'permissionCreate']);
        $permissionUpdate = Permission::create(['name' => 'permissionUpdate']);
        $permissionDelete = Permission::create(['name' => 'permissionDelete']);

        $rolelist = Permission::create(['name' => 'rolelist']);
        $roleCreate = Permission::create(['name' => 'roleCreate']);
        $roleUpdate = Permission::create(['name' => 'roleUpdate']);
        $roleDelete = Permission::create(['name' => 'roleDelete']);


        $admin->givePermissionTo([
            $categorylist,
            $categoryCreate,
            $categoryUpdate,
            $categoryDelete,

            $productlist,
            $productCreate,
            $productUpdate,
            $productDelete,

            $userlist,
            $userCreate,
            $userUpdate,
            $userDelete,

            $permissionlist,
            $permissionCreate,
            $permissionUpdate,
            $permissionDelete,

            $rolelist,
            $roleCreate,
            $roleUpdate,
            $roleDelete,
        ]);
        $user->givePermissionTo([
            $categorylist,

            $productlist,

            $userlist,

            $permissionlist,

            $rolelist,
        ]);
    }
}
