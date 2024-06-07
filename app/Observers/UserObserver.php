<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Permission;
use PermissionService;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        if($user->admin())
        {
            $permissions = Permission::select('name')->get();

            $permissions->map(function($permissionList)use($user){
                PermissionService::givePermissionTo(1,$permissionList->name);
            });

        }
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
