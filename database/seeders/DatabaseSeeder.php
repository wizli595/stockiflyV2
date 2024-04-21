<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{

    /**
     * List of applications to add.
     */
    private $permissions = [
        // 'role-list',
        // 'role-create',
        // 'role-edit',
        // 'role-delete',        
        // 'customer-list',
        // 'customer-create',
        // 'customer-edit',
        // 'customer-delete',
        'supplier-list',
        'supplier-create',
        'supplier-edit',
        'supplier-delete',
    //    'categorie-list',
    //     'categorie-create',
    //     'categorie-edit',
    //     'categorie-delete',
    //     'brand-list',
    //     'brand-create',
    //     'brand-edit',
    //     'brand-delete',
    //     'unite-list',
    //     'unite-create',
    //     'unite-edit',
    //     'unite-delete',
    //     'werhouse-list',
    //     'werhouse-create',
    //     'werhouse-edit',
    //     'werhouse-delete',
    //     'product-list',
    //     'product-create',
    //     'product-edit',
    //     'product-delete',
    //     'purchase-list',
    //     'purchase-create',
    //     'purchase-edit',
    //     'purchase-delete',        
    //     'purchaseDetail-list',
    //     'purchaseDetail-create',
    //     'purchaseDetail-edit',
    //     'purchaseDetail-delete',
    ];


    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // foreach ($this->permissions as $permission) {
        //     Permission::create(['name' => $permission]);
        // }

        // Create admin User and assign the role to him.
        $user = User::create([
            'name' => 'manager',
            'email' => 'manager@example.com',
            'password' => Hash::make('password')
        ]);

        $role = Role::create(['name' => RoleEnum::StockManager->value]);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);
    }
}
