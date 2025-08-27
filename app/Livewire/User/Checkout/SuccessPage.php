<?php

namespace App\Livewire\User\Checkout;

use App\Models\Transaction;
use Livewire\Component;

class SuccessPage extends Component
{
    public $amount;
    public $transactionID;
    public $user_id;
    protected $queryString = ['amount', 'transactionID', 'user_id'];

    public function mount()
    {
        // Ensure all required query string values are present
        if (!$this->amount || !$this->transactionID || !$this->user_id) {
            abort(404, 'Missing required query parameters.');
        }

        \Log::info('SuccessPage mounted with:', [
            'amount' => $this->amount,
            'transactionID' => $this->transactionID,
            'user_id' => $this->user_id,
        ]);

        // Create the transaction record
        $this->CreateTransactionRecord();
    }

    public function render()
    {
        $name = auth()->check()
                ? auth()->user()->firstname . ' ' . auth()->user()->lastname
                : 'Guest';

        $transactionID = $this->transactionID;

        return view('livewire.user.checkout.success-page', ['name' => $name, 'transactionID' => $transactionID]);
    }


    #===================[FUNCTIONS]==============================

    public function CreateTransactionRecord()
    {
        if (($this->transactionID) || ($this->user_id != \Auth::user()->id)) {
            Transaction::query()->updateOrInsert(
            [
                'transaction_code' => $this->transactionID,
                'tr_user_id' => \Auth::user()->id,
            ],[
                'amount' => intval($this->amount / 100),
                'status' => 'APPROVED',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } else {
            abort(404, 'Transaction ID is required.');
        }
    }
}
