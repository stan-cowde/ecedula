<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class ReportsTable extends Component
{
    use WithPagination;

    protected string $paginationTheme = 'bootstrap';

    // Search term for filtering by payor
    public string $search = '';

    // Preserve search in the URL (optional but helpful)
    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function updatedSearch(): void
    {
        // Reset pagination when search changes
        $this->resetPage();
    }

    public function fetchCollectionReportsIfExists()
    {
        $query = \DB::table('collection_and_deposit_reports')
            ->join('serial_number_receipts', 'serial_number_receipts.id', 'collection_and_deposit_reports.serial_number_receipt_id')
            ->select([
                'collection_and_deposit_reports.receipt_number',
                'collection_and_deposit_reports.payor',
                'collection_and_deposit_reports.particulars',
                'collection_and_deposit_reports.amount',
                'collection_and_deposit_reports.created_at',
                'serial_number_receipts.is_active as serial_number_receipt_is_active',
                'collection_and_deposit_reports.is_active as is_active',
            ])
            ->whereNotNull('collection_and_deposit_reports.is_active');

        if (trim($this->search) !== '') {
            $search = trim($this->search);
            $query->where('collection_and_deposit_reports.payor', 'like', "%{$search}%");
        }

        return $query->orderBy('collection_and_deposit_reports.created_at')
            ->paginate(10);
    }

    public function render()
    {
        $rows = $this->fetchCollectionReportsIfExists();

        return view('livewire.admin.reports-table', compact('rows'));
    }
}
