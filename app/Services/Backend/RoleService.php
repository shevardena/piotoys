<?php

namespace App\Services\Backend;

use App\Interfaces\PermissionRepositoryInterface;
use App\Interfaces\RoleRepositoryInterface;
use Illuminate\Support\Facades\DB;

class RoleService
{
    protected RoleRepositoryInterface $roleRepository;
    protected PermissionRepositoryInterface $permissionRepository;

    public function __construct(
        RoleRepositoryInterface $roleRepository,
        PermissionRepositoryInterface $permissionRepository
    ) {
        $this->roleRepository = $roleRepository;
        $this->permissionRepository = $permissionRepository;
    }

    /**
     * Store role
     * @param array $data
     * @return void
     * @throws \Exception
     */
    public function create(array $data): void
    {
        DB::beginTransaction();
        try {
            $role = $this->roleRepository->create($data);
            $permissions = $this->permissionRepository->getByIds($data['permissions']);
            $role->syncPermissions($permissions);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

        DB::commit();
    }

    /**
     * Update role
     * @param int $role
     * @param array $data
     * @return void
     * @throws \Exception
     */
    public function update(int $role, array $data): void
    {
        DB::beginTransaction();
        try {
            $this->roleRepository->update($role, $data);
            $role = $this->roleRepository->find($role);
            $permissions = $this->permissionRepository->getByIds($data['permissions']);
            $role->syncPermissions($permissions);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }

        DB::commit();
    }

    /**
     * Delete role
     * @param int $role
     * @return void
     */
    public function delete(int $role): void
    {
        $this->roleRepository->delete($role);
    }

}
