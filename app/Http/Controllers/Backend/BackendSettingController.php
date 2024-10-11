<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreSettingRequest;
use App\Http\Requests\Backend\UpdateSettingRequest;
use App\Http\Resources\SettingResource;
use App\Models\Setting;
use App\Repositories\SettingRepository;
use App\Services\Backend\BackendSettingService;
use App\Tables\SettingTable;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\FileUploads\ExistingFile;

class BackendSettingController extends Controller
{
    protected BackendSettingService $backendSettingService;
    protected SettingRepository $settingRepository;

    public function __construct(BackendSettingService $backendSettingService, SettingRepository $settingRepository)
    {
        $this->backendSettingService = $backendSettingService;
        $this->settingRepository = $settingRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        return view('backend.pages.setting.index', [
            'settings' => SettingTable::class,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): Application|Factory|View
    {
        return view('backend.pages.setting.create',[
            'setting_types' => $this->backendSettingService->getSettingTypes()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSettingRequest $request
     * @return RedirectResponse
     */
    public function store(StoreSettingRequest $request): RedirectResponse
    {
        try {
            $this->backendSettingService->create($request);
            Toast::title('Setting created successfully')->autoDismiss(5);
            return redirect()->route('settings.index');
        } catch (\Exception $e) {
            Toast::warning()->title('Error creating Setting: ' . $e->getMessage())->autoDismiss(5);
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $setting_id
     * @return Application|Factory|View
     */
    public function edit(int $setting_id): Application|Factory|View
    {
        return view('backend.pages.setting.edit', [
            'setting' => new SettingResource($this->settingRepository->find($setting_id)),
            'setting_types' => $this->backendSettingService->getSettingTypes()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSettingRequest $request
     * @param int $setting_id
     * @return RedirectResponse
     */
    public function update(UpdateSettingRequest $request, int $setting): RedirectResponse
    {
        try {
            $this->backendSettingService->update($setting->id, $request);
            Toast::title('Setting updated successfully')->autoDismiss(5);
            return redirect()->route('settings.index');
        } catch (\Exception $e) {
            Toast::warning()->title('Error updating Setting: ' . $e->getMessage())->autoDismiss(5);
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Setting $setting
     * @return RedirectResponse
     */
    public function destroy(Setting $setting): RedirectResponse
    {
        try {
            $this->backendSettingService->destroy($setting->id);
            Toast::title('Setting deleted successfully')->autoDismiss(5);
            return redirect()->route('settings.index');
        } catch (\Exception $e) {
            Toast::warning()->title('Error deleting Setting: ' . $e->getMessage())->autoDismiss(5);
            return redirect()->back();
        }
    }
}
