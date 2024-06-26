<?php

namespace App\Http\Controllers\Backend;

use App\Services\Backend\DashboardService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use ProtoneMedia\Splade\Facades\Toast;

class DashboardController
{
    protected DashboardService $dashboardService;

    public function __construct(
        DashboardService $dashboardService,
    ) {
        $this->dashboardService = $dashboardService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     */
    public function backend()
    {
        return redirect()->route('backend.dashboard');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     */
    public function index()
    {
        try {
            return view('backend.pages.dashboard');
        } catch (\Exception $e) {
            Toast::warning()
                ->title('Whoops!')
                ->message('Something went wrong: ' . $e->getMessage())
                ->autoDismiss(5);
        }
    }
}
