<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreRoleRequest;
use App\Http\Requests\Backend\UpdateRoleRequest;
use App\Interfaces\PermissionRepositoryInterface;
use App\Services\Backend\RoleService;
use App\Tables\Roles;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use ProtoneMedia\Splade\Facades\Toast;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    protected RoleService $roleService;
    protected PermissionRepositoryInterface $permissionRepository;

    /**
     * @param RoleService $roleService
     * @param PermissionRepositoryInterface $permissionRepository
     */
    public function __construct(RoleService $roleService, PermissionRepositoryInterface $permissionRepository)
    {
        $this->roleService = $roleService;
        $this->permissionRepository = $permissionRepository;
    }

    /**
     * Role list page
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function index(): \Illuminate\Foundation\Application|View|Factory|Application
    {
        return view('backend.pages.role.index', [
            'roles' => Roles::class,
        ]);
    }

    /**
     * Role create page
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function create(): \Illuminate\Foundation\Application|View|Factory|Application
    {
        return view('backend.pages.role.create', [
            'permissions' => $this->permissionRepository->getAll(),
            'guards' => [
                'admin' => 'admin',
                'web' => 'web'
            ]
        ]);
    }

    /**
     * Store role
     * @param StoreRoleRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRoleRequest $request): RedirectResponse
    {
        try {
            $this->roleService->create($request->validated());
            Toast::title('Role created successfully')
                ->autoDismiss(5);
            return redirect()->route('roles.index');
        } catch (\Exception $e) {
            Toast::warning()
                ->title('Error creating role: ' . $e->getMessage())
                ->autoDismiss(5);
            return redirect()->back();
        }
    }

    /**
     * Role edit page
     * @param Role $role
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function edit(Role $role): \Illuminate\Foundation\Application|View|Factory|Application
    {
        return view('backend.pages.role.edit', [
            'role' => $role,
            'permissions' => $this->permissionRepository->getAll(),
            'guards' => [
                'admin' => 'admin',
                'web' => 'web'
            ]
        ]);
    }

    /**
     * Update role
     * @param UpdateRoleRequest $request
     * @param int $role
     * @return RedirectResponse
     */
    public function update(UpdateRoleRequest $request, int $role): RedirectResponse
    {
        try {
            $this->roleService->update($role, $request->validated());
            Toast::title('Role updated successfully')->autoDismiss(5);
            return redirect()->back();
        } catch (\Exception $e) {
            Toast::warning()
                ->title('Error updating role: ' . $e->getMessage())
                ->autoDismiss(5);
            return redirect()->back();
        }
    }

    /**
     * Delete role
     * @param int $role
     * @return RedirectResponse
     */
    public function destroy(int $role): RedirectResponse
    {
        $this->roleService->delete($role);
        Toast::title('Role deleted')
            ->autoDismiss(5);
        return redirect()->back();

    }
}
