<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Validate;
use Livewire\Component;

class ReportsTable extends Component
{

    public $rows = [];

    public function fetchCollectionReportsIfExists()
    {
        $this->rows = \DB::table("collection_and_deposit_reports")
                        ->select(['serial_number', 'payor', 'particulars', 'amount'])
                        ->orderBy('created_at', 'desc')
                        ->get();
    }

    public function render()
    {
        $this->fetchCollectionReportsIfExists();

        return view('livewire.admin.reports-table');
    }
}
