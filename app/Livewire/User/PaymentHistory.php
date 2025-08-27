<?php

namespace App\Livewire\User;

use Livewire\Component;

class PaymentHistory extends Component
{

    public $results = [];


    public function showPaymentHistory()
    {
       $this->results = \DB::table('transactions')->where('tr_user_id', \Auth::user()->id)->get();
    }

    public function render()
    {
        $this->showPaymentHistory();

        return view('livewire.user.payment-history');
    }
}
