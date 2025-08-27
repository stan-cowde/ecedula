<?php

namespace App\Livewire\Admin\Dashboard;

use Livewire\Component;

class DataAnalytics extends Component
{

    public function CountnumberOfApplicants()
    {
        return \DB::table('users')->count();
    }

    public function TotalAmountOfTransactionByYear()
    {
        $year = \Carbon\Carbon::now()->year;

        return \DB::table('transactions')->whereYear('created_at', $year)->sum('amount');
    }

    function totalActiveTaxPayersThisYear()
    {
        $currentYear = \Carbon\Carbon::now()->year;

        return \DB::table('transactions')
            ->selectRaw('count(id) as total_paid')
            ->where('status', 'APPROVED')
            ->where('amount', '>', 0)
            ->whereYear('created_at', $currentYear)
            ->first()
            ->total_paid;
    }

    function totalActiveStaffThisYear(){

        $currentYear = \Carbon\Carbon::now()->year;

        return \DB::table('users')
            ->selectRaw('count(id) as staff_active')
            ->where('verified', 1)
            ->where('role', 2)
            ->whereYear('created_at', $currentYear)
            ->first()
            ->staff_active;
    }


    public function render()
    {
        return view('livewire.admin.dashboard.data-analytics');
    }
}
