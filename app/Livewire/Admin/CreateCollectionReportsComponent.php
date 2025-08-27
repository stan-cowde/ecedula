<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Validate;
use Livewire\Component;

#[Validate([
    'serial_number' => 'integer|required|unique:collection_and_deposit_reports,serial_number',
    'payor' => 'string|required',
    'particulars' => 'string|required',
    'amount' => 'numeric|required|min:0',
    'serial_number_from' => 'integer|required',
    'serial_number_to' => 'integer|required',
])]
class CreateCollectionReportsComponent extends Component
{

    public $isOpen = false;
    public $serial_number;
    public $payor;
    public $particulars = 'CTC';
    public $amount;


    public function save()
    {
        try {
            $data = $this->validate();

            #dd($data);

            \DB::table('collection_and_deposit_reports')->updateOrInsert(
                [
                    'serial_number' => $data['serial_number']
                ],
                [
                    'serial_number' => $data['serial_number'],
                    'payor' => $data['payor'],
                    'particulars' => $data['particulars'],
                    'amount' => $data['amount'],
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            );

            flash()->success('Successfully added collection report.');

            $this->reset();

            $this->isOpen = false;

            $this->dispatch('refresh-page');

        }catch(\Exception $exception){

            flash()->error($exception->getMessage());
        }
    }

    #public function save


    public function render()
    {
        return view('livewire.admin.create-collection-reports-component');
    }
}
