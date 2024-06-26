<?php

namespace App\Policies;

use App\Models\BackendUser;
use Illuminate\Auth\Access\Response;

class BackendUserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(BackendUser $backendUser): bool
    {
        return $backendUser->can('create admins');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(BackendUser $backendUser): bool
    {
        return $backendUser->can('view admin');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(BackendUser $backendUser): bool
    {
        return $backendUser->can('create admin');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(BackendUser $backendUser): bool
    {
        return $backendUser->can('edit admin');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(BackendUser $backendUser): bool
    {
        return $backendUser->can('delete admin');
    }
}
