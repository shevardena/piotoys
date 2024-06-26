<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreToyPurchaseRequest;
use App\Http\Requests\Backend\UpdateToyPurchaseRequest;
use App\Models\ToyPurchase;
use App\Services\Backend\ToyPurchaseService;
use App\Tables\ToyPurchases;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use ProtoneMedia\Splade\Facades\Toast;

class ToyPurchaseController extends Controller
{
    protected $toyPurchaseService;

    public function __construct(ToyPurchaseService $toyPurchaseService)
    {
        $this->toyPurchaseService = $toyPurchaseService;
    }

    /**
     * Toy Purchase list page
     * @return \Illuminate\Foundation\Application|View|Factory|Application
     */
    public function index(): \Illuminate\Foundation\Application|View|Factory|Application
    {
        return view('backend.pages.toy_purchase.index', [
            'toy_purchases' => ToyPurchases::class,
        ]);
    }

    /**
     * Create toy purchase page
     */
    public function create()
    {
        return view('backend.pages.toy_purchase.create');
    }

    /**
     * Store toy purchase
     * @param StoreToyPurchaseRequest $request
     * @return RedirectResponse
     */
    public function store(StoreToyPurchaseRequest $request): RedirectResponse
    {
        try {
            $this->toyPurchaseService->create($request->validated());
            Toast::title('Toy Purchase created successfully')
                ->autoDismiss(5);
            return redirect()->route('toy_purchases.index');
        } catch (Exception $e) {
            Toast::warning()
                ->title('Error creating toy purchase: ' . $e->getMessage())
                ->autoDismiss(5);
            return redirect()->back();
        }
    }

    /**
     * Toy purchase edit page
     * @param ToyPurchase $toy_purchase
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function edit(ToyPurchase $toy_purchase): \Illuminate\Foundation\Application|View|Factory|Application
    {
        return view('backend.pages.toy_purchase.edit', [
            'toy_purchase' => $toy_purchase
        ]);
    }

    /**
     * Update toy purchase
     * @param UpdateToyPurchaseRequest $request
     * @param int $toy_purchase
     * @return RedirectResponse
     */
    public function update(UpdateToyPurchaseRequest $request, int $toy_purchase): RedirectResponse
    {
        try {
            $this->toyPurchaseService->update($toy_purchase, $request->validated());
            Toast::title('Toy Purchase updated successfully')
                ->autoDismiss(5);
            return redirect()->back();
        } catch (Exception $e) {
            Toast::warning()
                ->title('Error updating toy purchase: ' . $e->getMessage())
                ->autoDismiss(5);
            return redirect()->back();
        }
    }


    /**
     * Delete $toy purchase
     * @param int $toy_purchase purchase
     * @return RedirectResponse
     */
    public function destroy(int $toy_purchase): RedirectResponse
    {
        try {
            $this->toyPurchaseService->destroy($toy_purchase);
            Toast::title('Toy Purchase deleted')
                ->autoDismiss(5);
            return redirect()->back();
        } catch (\Exception $e) {
            Toast::warning()
                ->title('Error deleting toy purchase: ' . $e->getMessage())
                ->autoDismiss(5);
            return redirect()->back();
        }
    }
}
