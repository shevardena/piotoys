<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreMenuRequest;
use App\Http\Requests\Backend\UpdateMenuRequest;
use App\Models\Menu;
use App\Repositories\MenuItemRepository;
use App\Repositories\MenuRepository;
use App\Services\Backend\BackendMenuService;
use App\Tables\MenuTable;
use App\Tables\RootMenuItemTable;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use ProtoneMedia\Splade\Facades\Toast;

class BackendMenuController extends Controller
{
    protected BackendMenuService $backendMenuService;
    protected MenuRepository $menuRepository;
    protected MenuItemRepository $menuItemRepository;

    public function __construct(BackendMenuService $backendMenuService, MenuRepository $menuRepository, MenuItemRepository $menuItemRepository)
    {
        $this->backendMenuService = $backendMenuService;
        $this->menuRepository = $menuRepository;
        $this->menuItemRepository = $menuItemRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        return view('backend.pages.menu.index', [
            'menus' => MenuTable::class,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): Application|Factory|View
    {
        return view('backend.pages.menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreMenuRequest $request
     * @return RedirectResponse
     */
    public function store(StoreMenuRequest $request): RedirectResponse
    {
        try {
            $this->backendMenuService->create($request->validated());
            Toast::title('Menu created successfully')->autoDismiss(5);
            return redirect()->route('menus.index');
        } catch (\Exception $e) {
            Toast::warning()->title('Error creating Menu: ' . $e->getMessage())->autoDismiss(5);
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $menu
     * @return Application|Factory|View
     */
    public function edit(int $menu): Application|Factory|View
    {
        return view('backend.pages.menu.edit', [
            'menu' => $this->menuRepository->find($menu),
            'menu_items' => RootMenuItemTable::class
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateMenuRequest $request
     * @param Menu $menu
     * @return RedirectResponse
     */
    public function update(UpdateMenuRequest $request, Menu $menu): RedirectResponse
    {
        try {
            $this->backendMenuService->update($menu->id, $request->validated());
            Toast::title('Menu updated successfully')->autoDismiss(5);
            return redirect()->route('menus.index');
        } catch (\Exception $e) {
            Toast::warning()->title('Error updating Menu: ' . $e->getMessage())->autoDismiss(5);
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Menu $menu
     * @return RedirectResponse
     */
    public function destroy(Menu $menu): RedirectResponse
    {
        try {
            $this->backendMenuService->destroy($menu->id);
            Toast::title('Menu deleted successfully')->autoDismiss(5);
            return redirect()->route('menus.index');
        } catch (\Exception $e) {
            Toast::warning()->title('Error deleting Menu: ' . $e->getMessage())->autoDismiss(5);
            return redirect()->back();
        }
    }
}
