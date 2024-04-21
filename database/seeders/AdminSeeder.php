<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $allPermissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',        
            'customer-list',
            'customer-create',
            'customer-edit',
            'customer-delete',
            'supplier-list',
            'supplier-create',
            'supplier-edit',
            'supplier-delete',
            'categorie-list',
            'categorie-create',
            'categorie-edit',
            'categorie-delete',
            'brand-list',
            'brand-create',
            'brand-edit',
            'brand-delete',
            'unite-list',
            'unite-create',
            'unite-edit',
            'unite-delete',
            'werhouse-list',
            'werhouse-create',
            'werhouse-edit',
            'werhouse-delete',
            'product-list',
            'product-create',
            'product-edit',
            'product-delete',
            'purchase-list',
            'purchase-create',
            'purchase-edit',
            'purchase-delete',        
            'purchaseDetail-list',
            'purchaseDetail-create',
            'purchaseDetail-edit',
            'purchaseDetail-delete',
        ];

        foreach ($allPermissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $user = User::create([
            'name' => 'Administrator',
            'email' => 'admin@example.com',
            'role'=> RoleEnum::Admin->value,
            'password' => Hash::make('password')
        ]);

        $role = Role::firstOrCreate(['name' => RoleEnum::Admin->value]);
        $role->syncPermissions($allPermissions);
        $user->assignRole($role);
    }
}
