<?php

namespace App\Repositories;

use App\Interfaces\ToyPurchaseRepositoryInterface;
use App\Models\ToyPurchase;
use Illuminate\Database\Eloquent\Collection;

class ToyPurchaseRepository implements ToyPurchaseRepositoryInterface
{

    protected $model;

    public function __construct(ToyPurchase $model)
    {
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

    public function create(array $data): ToyPurchase
    {
        $toyPurchase = new ToyPurchase();
        $this->save($toyPurchase, $data);
        return $toyPurchase;
    }

    public function update(int $id, array $data): ToyPurchase
    {
        $toyPurchase = $this->model->findOrFail($id);
        $this->save($toyPurchase, $data);
        return $toyPurchase;
    }

    public function delete(int $id): void
    {
        $this->model->destroy($id);
    }

    public function save(ToyPurchase $toyPurchase, array $data): void
    {
        $toyPurchase->name = $data['name'];
        $toyPurchase->box_count = $data['box_count'];
        $toyPurchase->price_per_kg = $data['price_per_kg'];
        $toyPurchase->purchase_date = $data['purchase_date'];
        $toyPurchase->amount_paid = $data['amount_paid'];

        $toyPurchase->save();
    }
}
