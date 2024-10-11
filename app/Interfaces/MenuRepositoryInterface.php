<?php

namespace App\Interfaces;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Collection;

interface MenuRepositoryInterface
{
    public function getAll(): Collection;

    public function find(int $id): ?Menu;

    public function create(array $data): Menu;

    public function update(int $id, array $data): Menu;

    public function delete(int $id): void;
}
