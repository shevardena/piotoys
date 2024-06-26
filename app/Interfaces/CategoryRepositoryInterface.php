<?php

namespace App\Interfaces;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

interface CategoryRepositoryInterface
{
    public function getAll(): Collection;

    public function find(int $id): ?Category;

    public function create(array $data);

    public function update(int $id, array $data);

    public function delete(int $id): void;
}
