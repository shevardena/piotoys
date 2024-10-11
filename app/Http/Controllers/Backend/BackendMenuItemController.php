<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreMenuItemRequest;
use App\Http\Requests\Backend\UpdateMenuItemRequest;
use App\Models\MenuItem;
use App\Repositories\CategoryRepository;
use App\Repositories\MenuItemRepository;
use App\Repositories\MenuRepository;
use App\Repositories\ProductRepository;
use App\Services\Backend\BackendMenuItemService;
use App\Tables\MenuItemTable;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use ProtoneMedia\Splade\Facades\Toast;

class BackendMenuItemController extends Controller
{
    protected BackendMenuItemService $backendMenuItemService;
    protected MenuItemRepository $menuItemRepository;
    protected MenuRepository $menuRepository;
    protected CategoryRepository $categoryRepository;
    protected ProductRepository $productRepository;

    public function __construct(BackendMenuItemService $backendMenuItemService, MenuItemRepository $menuItemRepository, MenuRepository $menuRepository, CategoryRepository $categoryRepository, ProductRepository $productRepository)
    {
        $this->backendMenuItemService = $backendMenuItemService;
        $this->menuItemRepository = $menuItemRepository;
        $this->menuRepository = $menuRepository;
        $this->categoryRepository = $categoryRepository;
        $this->productRepository = $productRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        return view('backend.pages.menu_item.index', [
            'menuItems' => MenuItemTable::class,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): Application|Factory|View
    {
        return view('backend.pages.menu_item.create', [
            'menus' => $this->menuRepository->getAll(),
            'menu_items' => $this->menuItemRepository->getAll(),
            'categories' => $this->categoryRepository->getAll(),
            'products' => $this->productRepository->getAll(),
            'types' => [
                [
                    'id' => 'url',
                    'name' => 'URL',
                ],
                [
                    'id' => 'model',
                    'name' => 'Model',
                ]
            ],
            'models' => [
                [
                    'id' => 'category',
                    'name' => 'Category',
                ],
                [
                    'id' => 'product',
                    'name' => 'Product',
                ]
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreMenuItemRequest $request
     * @return RedirectResponse
     */
    public function store(StoreMenuItemRequest $request): RedirectResponse
    {
        try {
            $this->backendMenuItemService->create($request->validated());
            Toast::title('MenuItem created successfully')->autoDismiss(5);
            return redirect()->route('menu_items.index');
        } catch (\Exception $e) {
            Toast::warning()->title('Error creating MenuItem: ' . $e->getMessage())->autoDismiss(5);
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $menuItem
     * @return Application|Factory|View
     */
    public function edit(int $menuItem): Application|Factory|View
    {
        return view('backend.pages.menu_item.edit', [
            'menuItem' => $this->repository->find($menuItem)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateMenuItemRequest $request
     * @param MenuItem $menuItem
     * @return RedirectResponse
     */
    public function update(UpdateMenuItemRequest $request, MenuItem $menuItem): RedirectResponse
    {
        try {
            $this->backendMenuItemService->update($menuItem->id, $request->validated());
            Toast::title('MenuItem updated successfully')->autoDismiss(5);
            return redirect()->route('menu_items.index');
        } catch (\Exception $e) {
            Toast::warning()->title('Error updating MenuItem: ' . $e->getMessage())->autoDismiss(5);
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param MenuItem $menuItem
     * @return RedirectResponse
     */
    public function destroy(MenuItem $menuItem): RedirectResponse
    {
        try {
            $this->backendMenuItemService->destroy($menuItem->id);
            Toast::title('MenuItem deleted successfully')->autoDismiss(5);
            return redirect()->route('menu_items.index');
        } catch (\Exception $e) {
            Toast::warning()->title('Error deleting MenuItem: ' . $e->getMessage())->autoDismiss(5);
            return redirect()->back();
        }
    }
}
