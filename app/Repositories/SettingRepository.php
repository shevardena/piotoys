<?php

namespace App\Repositories;

use App\Interfaces\SettingRepositoryInterface;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Database\Eloquent\Collection;

class SettingRepository implements SettingRepositoryInterface
{
    protected $model;

    public function __construct(Setting $model)
    {
        $this->model = $model;
    }

    public function getAll(): Collection
    {
        return $this->model->all();
    }

    public function find(int $id): ?Setting
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data): ?Setting
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data): Setting
    {
        $model = $this->model->find($id);
        $model->update($data);
        return $model;
    }

    public function delete(int $id): void
    {
        $this->model->destroy($id);
    }
}
