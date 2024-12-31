<?php

namespace App\Livewire\User\Dashboard;

use App\Models\Transaction;
use Livewire\Component;

class TransactionAnalytics extends Component
{

    public $totalPaid = 0;
    public $PaidByCurrentYear = 0;

    public $averagePercentage = 0;


    public function mount()
    {
        $this->totalPaid = Transaction::query()
                                        ->where('status', 'APPROVED')
                                        ->sum('amount');

        $this->PaidByCurrentYear = Transaction::query()
                                        ->where('status', 'APPROVED')
                                        ->whereYear('created_at', date('Y'))
                                        ->sum('amount');

        $this->averagePercentage = Transaction::query()
                                        ->whereYear('created_at', now()->year)
                                        ->selectRaw('(COUNT(CASE WHEN status = "APPROVED" THEN 1 END) / COUNT(*)) * 100 AS average_percentage')
                                        ->value('average_percentage');
    }




    public function render()
    {
        return view('livewire.user.dashboard.transaction-analytics');
    }
}
