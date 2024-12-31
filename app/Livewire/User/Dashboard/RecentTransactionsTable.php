<?php

namespace App\Livewire\User\Dashboard;

use App\Models\Transaction;
use Livewire\Component;

class RecentTransactionsTable extends Component
{

    public $recentTransactions = [];


    public function mount()
    {
        $this->recentTransactions = Transaction::all()->where('user_id', \Auth::user()->id)->sortByDesc('created_at');
    }


    public function render()
    {
        return view('livewire.user.dashboard.recent-transactions-table');
    }
}
