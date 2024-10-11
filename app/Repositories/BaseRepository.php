<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

abstract class BaseRepository
{

    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getAll(): Collection
    {
        return $this->model->all();
    }

    public function find(int $id): ?Model
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data): Model
    {
        $instance = $this->model->create($data);
        return $instance;
    }

    public function update(int $id, array $data): Model
    {
        $instance = $this->model->findOrFail($id);
        $instance->update($data);
        return $instance;
    }

    public function delete(int $id): void
    {
        $this->model->destroy($id);
    }
}
