<?php

namespace App\Livewire\Admin\Dashboard;

use Livewire\Component;

class AnnualPaymentProjection extends Component
{

    public $revenueDataByYear = [];

    public function DisplyAnnualPaymentProjectionChartAnalytics()
    {
        $currentYear = now()->year;

        $firstTransactionYear = \DB::table('transactions')
            ->selectRaw("strftime('%Y', MIN(created_at)) AS first_year")
            ->value('first_year');

        $startYear = $firstTransactionYear ?: $currentYear;

        return collect(range($startYear - 3, $startYear + 3))
            ->values();
    }

    #for total Revenue this year
    function totalRevenueFromPaymentsThisYear()
    {
        $currentYear = now()->year;

        return \DB::table('transactions')
            ->selectRaw('SUM(amount) as total_paid')
            ->where('status', 'APPROVED')
            ->whereYear('created_at', $currentYear)
            ->value('total_paid') ?? [];
    }

    public function revenueDataByYear()
    {
        // Generate revenue data for each year
        $startYear = now()->year;
        $endYear = $startYear + 5;

        for ($year = $startYear; $year <= $endYear; $year++) {
           $this->revenueDataByYear[$year] = $this->getMonthlyRevenue($year);
        }
    }

    function getMonthlyRevenue($currentYear = 0){
        $monthlyRevenue = array_fill_keys(range(1, 12), 0);

        $revenue = \DB::table('transactions')
            ->selectRaw("strftime('%m', created_at) as month, SUM(amount) as total")
            ->where('status', 'APPROVED')
            ->where('created_at', 'LIKE', $currentYear . '%')
            ->groupBy('month')
            ->get();

        foreach ($revenue as $row) {
            // Convert string month to integer to match array keys
            $monthlyRevenue[(int)$row->month] = $row->total;
        }

        return array_values($monthlyRevenue);
    }

    public function render()
    {
        $this->revenueDataByYear();

        return view('livewire.admin.dashboard.annual-payment-projection');
    }
}
