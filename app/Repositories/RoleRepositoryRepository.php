<?php

namespace App\Repositories;

use App\Interfaces\RoleRepositoryInterface;
use Spatie\Permission\Models\Role;

class RoleRepositoryRepository implements RoleRepositoryInterface
{
    protected Role $model;

    public function __construct(Role $role)
    {
        $this->model = $role;
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

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data): void
    {
        $this->model->findOrFail($id)->update($data);
    }

    public function delete(int $id): void
    {
        $this->model->findOrFail($id)->delete();
    }
}
