<?php

namespace App\Services\Backend;

use App\Repositories\CategoryRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use ProtoneMedia\Splade\Facades\Toast;

class CategoryService
{
    protected CategoryRepository $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Store category
     * @param array $data
     * @throws \Exception
     */
    public function create(array $data): void
    {
        DB::beginTransaction();
        try {
            $this->categoryRepository->create($data);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
        DB::commit();
    }

    /**
     * Update category
     * @param int $id
     * @param array $data
     * @return void
     * @throws \Exception
     */
    public function update(int $id, array $data): void
    {
        DB::beginTransaction();
        try {
//            dd($data);
            $this->categoryRepository->update($id, $data);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
        DB::commit();
    }

    /**
     * Delete category
     * @param int $category
     * @throws \Exception
     */
    public function destroy(int $category)
    {
        DB::beginTransaction();
        try {
            $this->categoryRepository->delete($category);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
        DB::commit();
    }

}
