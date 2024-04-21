<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class revokUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'revok {userId} {--tags=*}';
    protected $signature = 'revoke:role {roleName} {--permissions=*} {--exclude=}';

    /**
     * The console command description.
     *
     * @var string
     */
protected $description = 'Revoke specified permissions from a user.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $roleName = $this->argument('roleName');
        $permissionsToRevoke = $this->option('permissions');
        $exclusions = $this->option('exclude');

        // Ensure exclusions are treated as an array
        $exclusions = (array) $exclusions;  // Cast exclusions to an array to prevent type issues

        $role = \Spatie\Permission\Models\Role::findByName($roleName);

        if (!$role) {
            $this->error("Role '{$roleName}' not found.");
            return;
        }

        // If no specific permissions are provided, assume revoking all except exclusions
        if (empty($permissionsToRevoke)) {
            $allPermissions = $role->permissions->pluck('name')->toArray();
            $permissionsToRevoke = $allPermissions;
        }

        // If exclusions are specified, filter the permissions to revoke
        if (!empty($exclusions)) {
            $permissionsToRevoke = array_diff($permissionsToRevoke, $exclusions);
        }

        if (empty($permissionsToRevoke)) {
            $this->info('No permissions left to revoke after applying exclusions.');
            return;
        }

        // Proceed to revoke the remaining permissions
        foreach ($permissionsToRevoke as $permissionName) {
            if ($role->hasPermissionTo($permissionName)) {
                $role->revokePermissionTo($permissionName);
                $this->info("Permission '{$permissionName}' revoked from role '{$roleName}'.");
            } else {
                $this->error("Role '{$roleName}' does not have the permission '{$permissionName}'.");
            }
        }

        // Clear the permission cache to ensure changes take effect immediately
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
        $this->info("Permissions have been updated and cache cleared.");
}

    
    
}
