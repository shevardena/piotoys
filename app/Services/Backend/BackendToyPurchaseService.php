<?php

namespace App\Services\Backend;

use App\Repositories\ToyPurchaseRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use ProtoneMedia\Splade\Facades\Toast;

class BackendToyPurchaseService
{
    protected ToyPurchaseRepository $toypurchaseRepository;

    public function __construct(ToyPurchaseRepository $toypurchaseRepository)
    {
        $this->toypurchaseRepository = $toypurchaseRepository;
    }

    /**
     * Store toy purchase
     * @param array $data
     * @throws \Exception
     */
    public function create(array $data): void
    {
        DB::beginTransaction();
        try {
            $this->toypurchaseRepository->create($data);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
        DB::commit();
    }

    /**
     * Update toy purchase
     * @param int $id
     * @param array $data
     * @return void
     * @throws \Exception
     */
    public function update(int $id, array $data): void
    {
        DB::beginTransaction();
        try {
            $this->toypurchaseRepository->update($id, $data);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
        DB::commit();
    }

    /**
     * @param int $toy_purchase
     * @return RedirectResponse
     */
    public function destroy(int $toy_purchase): RedirectResponse
    {
        $this->toypurchaseRepository->delete($toy_purchase);
        Toast::title('Toy purchase deleted')->autoDismiss(5);
        return redirect()->back();
    }

}
