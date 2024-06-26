<?php

namespace App\Services\Backend;

use App\Models\BackendUser;
use Illuminate\Database\Eloquent\Collection;
use Spatie\Permission\Models\Permission;

class PermissionService
{
    protected $model;

    public function __construct(Permission $model)
    {
        $this->model = $model;
    }

    /**
     * Get all records
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->model->all();
    }

    /**
     * Store permission
     * @param array $data
     * @return void
     */
    public function store(array $data): void
    {
        Permission::create($data);
    }

    /**
     * Update permission
     * @param array $data
     * @param Permission $permission
     * @return void
     */
    public function update(array $data, Permission $permission): void
    {
        $permission->update($data);
    }

    /**
     * Delete permission
     * @param Permission $permission
     * @return void
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
    }

}
