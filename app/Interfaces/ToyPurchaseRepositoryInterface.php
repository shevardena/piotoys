<?php

namespace App\Interfaces;

use App\Models\ToyPurchase;
use Illuminate\Database\Eloquent\Collection;

interface ToyPurchaseRepositoryInterface
{
    public function getAll(): Collection;

    public function find(int $id): ?ToyPurchase;

    public function create(array $data): ToyPurchase;

    public function update(int $id, array $data): ToyPurchase;

    public function save(ToyPurchase $toyPurchase, array $data): void;

    public function delete(int $id): void;
}
