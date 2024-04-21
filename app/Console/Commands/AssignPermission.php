<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class AssignPermission extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "permission:assign";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $roleId = $this->ask('Enter the user ID');
        $permissionName = $this->ask('Enter the permission name');

        $role = Role::find($roleId);
        if (!$role) {
            $this->error("Role with ID $roleId not found.");
            return;
        }

        // Search for permissions that match the search term
        $permissions = Permission::where('name', 'like', "%{$permissionName}%")->get();

        if ($permissions->isEmpty()) {
            $this->info("No permissions found matching '{$permissionName}'.");
            return;
        }

        // Assign all matching permissions to the role
        $role->givePermissionTo($permissions);
        $this->info("All matching permissions have been assigned to ROLE ID {$roleId}.");
    }




}
