<?php

namespace App\Interfaces;

use App\Models\Product;
use App\Models\Setting;
use Illuminate\Database\Eloquent\Collection;

interface SettingRepositoryInterface
{
    public function getAll(): Collection;

    public function find(int $id): ?Setting;

    public function create(array $data): ?Setting;

    public function update(int $id, array $data): Setting;

    public function delete(int $id): void;
}
