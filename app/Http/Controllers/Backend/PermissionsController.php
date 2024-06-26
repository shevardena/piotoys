<?php

namespace App\Http\Controllers\Backend;

use App\Forms\Backend\CreatePermissionForm;
use App\Forms\Backend\EditPermissionForm;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StorePermissionRequest;
use App\Http\Requests\Backend\UpdatePermissionRequest;
use App\Interfaces\PermissionRepositoryInterface;
use App\Tables\Permissions;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use ProtoneMedia\Splade\Facades\Toast;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    protected PermissionRepositoryInterface $permissionRepository;

    /**
     * @param PermissionRepositoryInterface $permissionRepository
     */
    public function __construct(PermissionRepositoryInterface $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    /**
     * Permission list page
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function index(): \Illuminate\Foundation\Application|View|Factory|Application
    {
        return view('backend.pages.permission.index', [
            'permissions' => Permissions::class,
        ]);
    }

    /**
     * Permission create page
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function create(): \Illuminate\Foundation\Application|View|Factory|Application
    {
        return view('backend.pages.permission.create', [
            'form' => CreatePermissionForm::class
        ]);
    }

    /**
     * Store permission
     * @param StorePermissionRequest $request
     * @return RedirectResponse
     */
    public function store(StorePermissionRequest $request): RedirectResponse
    {
        try {
            $this->permissionRepository->store($request->validated());
            Toast::title('Permission created successfully')
                ->autoDismiss(5);
            return redirect()->route('permissions.index');
        } catch (\Exception $e) {
            Toast::warning()
                ->title('Error creating permission: ' . $e->getMessage())
                ->autoDismiss(5);
            return redirect()->back();
        }
    }

    /**
     * Permission edit page
     * @param Permission $permission
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function edit(Permission $permission): \Illuminate\Foundation\Application|View|Factory|Application
    {
        return view('backend.pages.permission.edit', [
            'form' => EditPermissionForm::make()
                ->fill($permission)
                ->method('PUT')
                ->action(route('permissions.update', $permission))
        ]);
    }

    /**
     * Update permission
     * @param UpdatePermissionRequest $request
     * @param int $permission
     * @return RedirectResponse
     */
    public function update(UpdatePermissionRequest $request, int $permission): RedirectResponse
    {
        try {
            $this->permissionRepository->update($permission, $request->validated());
            Toast::title('Permission updated successfully')
                ->autoDismiss(5);
            return redirect()->back();
        } catch (\Exception $e) {
            Toast::warning()
                ->title('Error updating permission: ' . $e->getMessage())
                ->autoDismiss(5);
            return redirect()->back();
        }
    }


    /**
     * Delete admin
     * @param int $permission
     * @return RedirectResponse
     */
    public function destroy(int $permission): RedirectResponse
    {
        $this->permissionRepository->delete($permission);
        Toast::title('Permission deleted')
            ->autoDismiss(5);
        return redirect()->back();
    }
}
