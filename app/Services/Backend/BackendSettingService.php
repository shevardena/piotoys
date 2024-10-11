<?php

namespace App\Services\Backend;

use App\Http\Requests\Backend\StoreSettingRequest;
use App\Repositories\SettingRepository;
use Illuminate\Support\Facades\DB;
use ProtoneMedia\Splade\FileUploads\HandleSpladeFileUploads;

class BackendSettingService
{
    protected SettingRepository $repository;

    public function __construct(SettingRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(StoreSettingRequest $request): void
    {
        DB::beginTransaction();
        try {
            $model = $this->repository->create($request->validated());
            HandleSpladeFileUploads::syncMediaLibrary($request, $model, 'og_image');
            HandleSpladeFileUploads::syncMediaLibrary($request, $model, 'logo');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
        DB::commit();
    }

    public function update(int $id, $request): void
    {
        DB::beginTransaction();
        try {
            $model = $this->repository->update($id, $request->validated());
            HandleSpladeFileUploads::syncMediaLibrary($request, $model, 'og_image','og_image');
            HandleSpladeFileUploads::syncMediaLibrary($request, $model, 'logo','logo');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
        DB::commit();
    }

    public function destroy(int $id): void
    {
        DB::beginTransaction();
        try {
            $this->repository->delete($id);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
        DB::commit();
    }

    public function getSettingTypes(): array
    {
        return [
            [
                'id' => 'website_parameters',
                'name' => 'Website Parameters',
            ],
            [
                'id' => 'contact_information',
                'name' => 'Contact Information',
            ]
        ];
    }
}
