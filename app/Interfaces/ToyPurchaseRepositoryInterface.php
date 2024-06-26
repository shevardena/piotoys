<?php

namespace App\Interfaces;

use App\Models\ToyPurchase;
use Illuminate\Database\Eloquent\Collection;

interface ToyPurchaseRepositoryInterface
{
    public function getAll(): Collection;

    public function find(int $id): ?ToyPurchase;

    public function create(array $data);

    public function update(int $id, array $data);

    public function delete(int $id): void;
}
