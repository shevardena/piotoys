<?php

namespace App\Services\Backend;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class DashboardService
{

    /**
     * Get latest expenses
     * @return Collection|array
     */
    public function getLatestExpenses(): Collection|array
    {
        $data = [
            'order_by' => 'created_at',
            'order_direction' => 'desc',
            'take' => 10
        ];
        return $this->expenseRepository->filter($data)->get();
    }
}
