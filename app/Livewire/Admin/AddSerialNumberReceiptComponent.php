<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class AddSerialNumberReceiptComponent extends Component
{
    public $serial_number_to;

    public $serial_number_from;

    public $isOpen = false;

    public function rules()
    {
        return [
            'serial_number_to' => 'required|integer|min:1|unique:serial_number_receipts,serial_number_to',
            'serial_number_from' => 'required|integer|min:1|unique:serial_number_receipts,serial_number_from',
        ];
    }

    public function render()
    {
        return view('livewire.admin.add-serial-number-receipt-component');
    }

    public function addSerialNumberReceipt()
    {
        $this->validate();

        if (intval($this->serial_number_from)  > intval($this->serial_number_to)) {
            flash()->error('Serial Number (From) must be less than Serial Number (To)');

            return;
        }

        if (is_null($this->serial_number_from || $this->serial_number_to)) {

            flash()->error('Serial Number (From) must not be null or empty');

            return;
        }

        try {

            \App\Models\SerialNumberReceipt::create([
                'serial_number_from' => $this->serial_number_from,
                'serial_number_to' => $this->serial_number_to,
                'is_ative' => 1,
            ]);

            for ($i = $this->serial_number_from; $i <= $this->serial_number_to; $i++) {

                \DB::table('collection_and_deposit_reports')->insert([
                    'serial_number_receipt_id' => \App\Models\SerialNumberReceipt::latest()->first()->id,
                    'receipt_number' => $i,
                    'payor' => '',
                    'particulars' => '',
                    'amount' => 0,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

            }

            flash()->success('Serial Number Receipt Added Successfully');

        } catch (\Throwable $th) {

            flash()->error($th->getMessage());
            \Log::error($th->getMessage());

            return;
        }
    }
}
