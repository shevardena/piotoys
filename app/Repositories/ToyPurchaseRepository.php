<?php

namespace App\Repositories;

use App\Interfaces\ToyPurchaseRepositoryInterface;
use App\Models\ToyPurchase;
use Illuminate\Database\Eloquent\Collection;

class ToyPurchaseRepository implements ToyPurchaseRepositoryInterface
{

    protected $model;

    public function __construct(ToyPurchase $model){
        $this->model = $model;
    }

    public function getAll(): Collection
    {
        return $this->model->all();
    }

    public function find(int $id): ?ToyPurchase
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
