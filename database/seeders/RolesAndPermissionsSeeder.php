<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Enums\RoleEnum;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // Create permissions
        // TODO - add more 
        $permissions = [
            'manage_stock',
            'view_stock',
            'create_stock',
            'edit_stock',
            'delete_stock',
            // Dummy permissions
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create roles and assign existing permissions
        $adminPermissions = Permission::all(); // Assuming admin has all permissions
        Role::create(['name' => RoleEnum::Admin->value])
            ->givePermissionTo($adminPermissions);

        $stockManagerPermissions = ['manage_stock', 'view_stock', 'create_stock', 'edit_stock'];
        Role::create(['name' => RoleEnum::StockManager->value])
            ->givePermissionTo($stockManagerPermissions);
    }
}
