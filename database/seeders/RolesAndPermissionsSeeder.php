<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use App\Models\User;
use Illuminate\Support\Str;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $noPermission = Permission::create(['name' => 'N/A']);

        $createUserPermission = Permission::create(['name' => 'create: user']);
        $readUserPermission = Permission::create(['name' => 'read: user']);
        $updateUserPermission = Permission::create(['name' => 'update: user']);
        $deleteUserPermission = Permission::create(['name' => 'delete: user']);

        $createRolePermission = Permission::create(['name' => 'create: role']);
        $readRolePermission = Permission::create(['name' => 'read: role']);
        $updateRolePermission = Permission::create(['name' => 'update: role']);
        $deleteRolePermission = Permission::create(['name' => 'delete: role']);

        $createPermission = Permission::create(['name' => 'create: permission']);
        $readPermission = Permission::create(['name' => 'read: permission']);
        $updatePermission = Permission::create(['name' => 'update: permission']);
        $deletePermission = Permission::create(['name' => 'delete: permission']);

        $readAdminPermission = Permission::create(['name' => 'read: admin']);
        $updateAdminPermission = Permission::create(['name' => 'update: admin']);

        Role::create(['name' => 'user'])->syncPermissions([
            $noPermission,
        ]);

        Role::create(['name' => 'admin'])->syncPermissions([
            $createUserPermission,
            $readUserPermission,
            $updateUserPermission,
            $deleteUserPermission,
            $createRolePermission,
            $readRolePermission,
            $updateRolePermission,
            $deleteRolePermission,
            $createPermission,
            $readPermission,
            $updatePermission,
            $deletePermission,
            $readAdminPermission,
            $updateAdminPermission,
        ]);
    }
}
