<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\SerialNumberReceipt;

class SerialNumberTable extends Component
{
    use WithPagination;

    protected string $paginationTheme = 'bootstrap';

    public string $search = '';

    // Modal and form state
    public bool $showEditModal = false;
    public bool $showDeleteModal = false;
    public bool $isOpen = false; // For AlpineJS @entangle
    public ?int $selectedId = null;
    public $serial_number_from;
    public $serial_number_to;
    public $is_active = 1;

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    protected function rules()
    {
        return [
            'serial_number_from' => ['required', 'integer', 'min:0'],
            'serial_number_to' => ['required', 'integer', 'gte:serial_number_from'],
            'is_active' => ['required', 'in:0,1'],
        ];
    }

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    protected function query()
    {
        $query = SerialNumberReceipt::query()
            ->where('is_active', 1);

        if (trim($this->search) !== '') {
            $search = trim($this->search);
            $query->where(function ($q) use ($search) {
                $q->where('serial_number_from', 'like', "%{$search}%")
                  ->orWhere('serial_number_to', 'like', "%{$search}%");
            });
        }

        return $query->orderBy('serial_number_from');
    }

    public function countReceiptsLeft($serialNumberReceiptId = null)
    {
        $query = \DB::table('collection_and_deposit_reports')
            ->whereNull('is_active');

        if (!is_null($serialNumberReceiptId)) {
            $query->where('serial_number_receipt_id', $serialNumberReceiptId);
        }

        return $query->count();
    }

    public function countReceiptsUsed($serialNumberReceiptId = null)
    {
        $query = \DB::table('collection_and_deposit_reports')
            ->whereNotNull('is_active');

        if (!is_null($serialNumberReceiptId)) {
            $query->where('serial_number_receipt_id', $serialNumberReceiptId);
        }

        return $query->count();
    }

    public function edit(int $id): void
    {
        $this->resetValidation();
        $this->selectedId = $id;
        $row = SerialNumberReceipt::findOrFail($id);
        $this->serial_number_from = $row->serial_number_from;
        $this->serial_number_to = $row->serial_number_to;
        $this->isOpen = true;
    }

    public function update(): void
    {
        if (!$this->selectedId) {
            return;
        }
        $this->validate();

        $row = SerialNumberReceipt::findOrFail($this->selectedId);
        $row->serial_number_from = (int) $this->serial_number_from;
        $row->serial_number_to = (int) $this->serial_number_to;
        $row->save();

        $this->isOpen = false;
        $this->resetForm();
        flash()->success('Serial number updated successfully.');
    }

    public function delete(int $id): void
    {
        $this->selectedId = $id;
        $this->showDeleteModal = true;
    }

    public function deactivate(): void
    {
        if (!$this->selectedId) {
            return;
        }

        $row = SerialNumberReceipt::findOrFail($this->selectedId);
        $row->is_active = 0;
        $row->save();

        $this->showDeleteModal = false;
        $this->resetForm();
        flash()->success('Serial number deactivated successfully.');
        $this->resetPage();
    }

    public function resetForm(): void
    {
        $this->reset(['selectedId', 'serial_number_from', 'serial_number_to', 'is_active']);
        $this->resetValidation();
    }

    public function render()
    {
        $rows = $this->query()->paginate(10);

        return view('livewire.admin.serial-number-table', [
            'rows' => $rows,
        ]);
    }
}
