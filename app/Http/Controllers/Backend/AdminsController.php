<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreAdminRequest;
use App\Http\Requests\Backend\UpdateAdminRequest;
use App\Interfaces\RoleRepositoryInterface;
use App\Repositories\BackendUserRepository;
use App\Services\Backend\BackendUserService;
use App\Tables\BackendUsers;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use ProtoneMedia\Splade\Facades\Toast;

class AdminsController extends Controller
{
    protected BackendUserService $backendUserService;
    protected BackendUserRepository $backendUserRepository;
    protected RoleRepositoryInterface $roleRepository;

    public function __construct(
        BackendUserService $backendUserService,
        BackendUserRepository $backendUserRepository,
        RoleRepositoryInterface $roleRepository
    ) {
        $this->backendUserService = $backendUserService;
        $this->roleRepository = $roleRepository;
        $this->backendUserRepository = $backendUserRepository;
    }

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function index(): \Illuminate\Foundation\Application|View|Factory|Application
    {
        return view('backend.pages.admin.index', [
            'users' => BackendUsers::class,
        ]);
    }

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function create(): \Illuminate\Foundation\Application|View|Factory|Application
    {
        return view('backend.pages.admin.create', [
            'roles' => $this->roleRepository->getAll()
        ]);
    }

    /**
     * @param StoreAdminRequest $request
     * @return RedirectResponse
     * @throws \Exception
     */
    public function store(StoreAdminRequest $request): RedirectResponse
    {
        try {
            $this->backendUserService->store($request->validated());
            Toast::title('Administrator created successfully')
                ->autoDismiss(5);
            return redirect()->route('administrators.index');
        } catch (\Exception $e) {
            Toast::warning()
                ->title('Whoops!')
                ->message('Error creating administrator: ' . $e->getMessage())
                ->autoDismiss(5);
            return redirect()->route('administrators.index');
        }
    }

    /**
     * @param int $administrator
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function edit(int $administrator): \Illuminate\Foundation\Application|View|Factory|Application
    {
        return view('backend.pages.admin.edit', [
            'administrator' => $this->backendUserRepository->find($administrator),
            'roles' => $this->roleRepository->getAll()
        ]);
    }

    /**
     * @param UpdateAdminRequest $request
     * @param int $administrator
     * @return RedirectResponse
     */
    public function update(UpdateAdminRequest $request, int $administrator): RedirectResponse
    {
        try {
            $this->backendUserService->update($administrator, $request->validated());
            Toast::title('Administrator updated successfully')
                ->autoDismiss(5);
            return redirect()->back();
        } catch (\Exception $e) {
            Toast::warning()
                ->title('Whoops!')
                ->message('Error updating administrator: ' . $e->getMessage())
                ->autoDismiss(5);
            return redirect()->back();
        }
    }

    /**
     * @param int $administrator
     * @return RedirectResponse
     */
    public function destroy(int $administrator): RedirectResponse
    {
        $this->backendUserService->delete($administrator);
        Toast::title('Administrator deleted')->autoDismiss(5);
        return redirect()->back();
    }
}
