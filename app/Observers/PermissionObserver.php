<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Permission;

class PermissionObserver
{
    /**
     * Handle the Permission "created" event.
     */
    public function created(Permission $permission): void
    {
        $users = User::get();
        dd('here');

        $permission->map(function($permission){

            // if($user->admin())
            // {
                PermissionService::givePermissionTo(1,$permission->name);
            // }

        });


    }

    /**
     * Handle the Permission "updated" event.
     */
    public function updated(Permission $permission): void
    {
        //
    }

    /**
     * Handle the Permission "deleted" event.
     */
    public function deleted(Permission $permission): void
    {
        //
    }

    /**
     * Handle the Permission "restored" event.
     */
    public function restored(Permission $permission): void
    {
        //
    }

    /**
     * Handle the Permission "force deleted" event.
     */
    public function forceDeleted(Permission $permission): void
    {
        //
    }
}
