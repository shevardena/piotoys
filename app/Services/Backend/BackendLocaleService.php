<?php

namespace App\Services\Backend;

use App\Repositories\LocaleRepository;
use Illuminate\Support\Facades\DB;

class BackendLocaleService
{
    protected LocaleRepository $repository;

    public function __construct(LocaleRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(array $data): void
    {
        DB::beginTransaction();
        try {
            $this->repository->create($data);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
        DB::commit();
    }

    public function update(int $id, array $data): void
    {
        DB::beginTransaction();
        try {
            $this->repository->update($id, $data);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
        DB::commit();
    }

    public function destroy(int $id): void
    {
        DB::beginTransaction();
        try {
            $this->repository->delete($id);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
        DB::commit();
    }
}
