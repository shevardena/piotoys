<?php

namespace App\Repositories;

use App\Interfaces\MenuItemRepositoryInterface;
use App\Models\MenuItem;
use Illuminate\Database\Eloquent\Collection;

class MenuItemRepository implements MenuItemRepositoryInterface
{
    protected $model;

    public function __construct(MenuItem $model)
    {
        $this->model = $model;
    }

    public function getAll(): Collection
    {
        return $this->model->all();
    }

    public function getRootMenuItems(int $menu_id): Collection
    {
        return $this->model->where('menu_id', $menu_id)->get();
    }

    public function find(int $id): ?MenuItem
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data)
    {
        $this->model->create($data);
    }

    public function update(int $id, array $data)
    {
        $this->model->find($id)->update($data);
    }

    public function delete(int $id): void
    {
        $this->model->destroy($id);
    }
}
