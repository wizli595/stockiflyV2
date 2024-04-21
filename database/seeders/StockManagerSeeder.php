<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class StockManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'supplier-list',
            'supplier-create',
            'supplier-edit',
            'supplier-delete',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        $user = User::create([
            'name' => 'Stock Manager',
            'email' => 'stockmanager@example.com',
            'role'=> RoleEnum::StockManager->value,
            'password' => Hash::make('password')
        ]); 

        $role = Role::firstOrCreate(['name' => RoleEnum::StockManager->value]);
        $role->syncPermissions($permissions);
        $user->assignRole($role);
    }
}
