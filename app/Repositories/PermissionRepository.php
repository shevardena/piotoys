<?php

namespace App\Repositories;

use App\Interfaces\PermissionRepositoryInterface;
use Spatie\Permission\Models\Permission;

class PermissionRepository implements PermissionRepositoryInterface
{
    protected Permission $model;

    public function __construct(Permission $permission)
    {
        $this->model = $permission;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getByIds(array $ids)
    {
        return $this->model->whereIn('id', $ids)->get();
    }

    public function find(int $id)
    {
        return $this->model->find($id);
    }

    public function store(array $data)
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data)
    {
        $this->model->findOrFail($id)->update($data);
    }

    public function delete(int $id)
    {
        $this->model->findOrFail($id)->delete();
    }
}
