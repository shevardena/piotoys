<?php

namespace App\Policies;

use App\Models\BackendUser;
use Spatie\Permission\Models\Permission;

class PermissionPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(BackendUser $backendUser): bool
    {
        return $backendUser->can('view permissions');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(BackendUser $backendUser, Permission $permission): bool
    {
        return $backendUser->can('view permission');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(BackendUser $backendUser): bool
    {
        return $backendUser->can('create permission');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(BackendUser $backendUser, Permission $permission): bool
    {
        return $backendUser->can('update permission');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(BackendUser $backendUser, Permission $permission): bool
    {
        return $backendUser->can('delete permission');
    }
}
