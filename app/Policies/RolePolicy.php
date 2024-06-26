<?php

namespace App\Policies;

use App\Models\BackendUser;
use Spatie\Permission\Models\Role;

class RolePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(BackendUser $backendUser): bool
    {
        return $backendUser->can('view roles');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(BackendUser $backendUser, Role $role): bool
    {
        return $backendUser->can('view role');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(BackendUser $backendUser): bool
    {
        return $backendUser->can('create role');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(BackendUser $backendUser, Role $role): bool
    {
        return $backendUser->can('update role');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(BackendUser $backendUser, Role $role): bool
    {
        return $backendUser->can('delete role');
    }
}
