<?php

namespace App\Repositories;

use App\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository implements CategoryRepositoryInterface
{

    protected $model;

    public function __construct(Category $model){
        $this->model = $model;
    }

    public function getAll(): Collection
    {
        return $this->model->all();
    }

    public function find(int $id): ?Category
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $data)
    {
        $this->model->create($data);
    }

    public function update(int $id, array $data)
    {
        $this->model->find($id)->update($data);
    }

    public function delete(int $id): void
    {
        $this->model->destroy($id);
    }
}
