<?php

namespace App\Services\Backend;

use App\Interfaces\PermissionRepositoryInterface;
use App\Interfaces\RoleRepositoryInterface;
use App\Repositories\BackendUserRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BackendUserService
{
    protected BackendUserRepository $backendUserRepository;
    protected RoleRepositoryInterface $roleRepository;
    protected PermissionRepositoryInterface $permissionRepository;

    public function __construct(
        BackendUserRepository $backendUserRepository,
        RoleRepositoryInterface $roleRepository,
        PermissionRepositoryInterface $permissionRepository
    ) {
        $this->backendUserRepository = $backendUserRepository;
        $this->roleRepository = $roleRepository;
        $this->permissionRepository = $permissionRepository;
    }

    /**
     * Store administrator
     * @param array $data
     * @return void
     * @throws \Exception
     */
    public function store(array $data): void
    {

        DB::beginTransaction();

        try {

            $password = $data['password'] ?? null;
            $roles = $data['roles'] ?? null;

            if ($password) {
                $data['password'] = Hash::make($data['password']);
            }

            $user = $this->backendUserRepository->create($data);

            if ($roles) {
                $roles = $this->roleRepository->getByIds($roles);
                $user->syncRoles($roles);
            }

        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

        DB::commit();
    }

    /**
     * Update administrator
     * @param array $data
     * @param int $id
     * @return void
     * @throws \Exception
     */
    public function update(int $id, array $data): void
    {
        DB::beginTransaction();

        try {
            $password = $data['password'] ?? null;
            $roles = $data['roles'] ?? null;

            if ($password) {
                $data['password'] = Hash::make($data['password']);
            }

            $this->backendUserRepository->update($id, $data);
            $administrator = $this->backendUserRepository->find($id);

            if ($roles) {
                $roles = $this->roleRepository->getByIds($roles);
                $administrator->syncRoles($roles);
            } else {
                $administrator->syncRoles([]);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

        DB::commit();
    }

    /**
     * Delete administrator
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {
        $this->backendUserRepository->delete($id);
    }
}
