<?php

namespace App\Interfaces;

use App\Models\MenuItem;
use Illuminate\Database\Eloquent\Collection;

interface MenuItemRepositoryInterface
{
    public function getAll(): Collection;
    public function getRootMenuItems(int $menu_id): Collection;

    public function find(int $id): ?MenuItem;

    public function create(array $data);

    public function update(int $id, array $data);

    public function delete(int $id): void;
}
