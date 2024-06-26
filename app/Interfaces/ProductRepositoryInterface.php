<?php

namespace App\Interfaces;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

interface ProductRepositoryInterface
{
    public function getAll(): Collection;

    public function find(int $id): ?Product;

    public function create(array $data): Product;

    public function update(int $id, array $data);

    public function delete(int $id): void;
}
