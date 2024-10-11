<?php

namespace App\Repositories;

use App\Interfaces\MenuRepositoryInterface;
use App\Models\Menu;
use Illuminate\Database\Eloquent\Collection;

class MenuRepository implements MenuRepositoryInterface
{
    protected $model;

    public function __construct(Menu $model)
    {
        $this->model = $model;
    }

    public function getAll(): Collection
    {
        return $this->model->all();
    }

    public function find(int $id): ?Menu
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data): Menu
    {
        $menu = new Menu();
        $this->save($menu, $data);
        return $menu;
    }

    public function update(int $id, array $data): Menu
    {
        $menu = $this->model->findOrFail($id);
        $this->save($menu, $data);
        return $menu;
    }

    protected function save(Menu $menu, array $data): void
    {
        $menu->name = $data['name'];
        $menu->is_active = $data['is_active'];

        $menu->save();
    }

    public function delete(int $id): void
    {
        $this->model->destroy($id);
    }
}
