<?php

namespace App\Livewire\User\Verification;

use Livewire\Attributes\Validate;
use Livewire\Component;

#[Validate([
    'address' => 'required|string|max:255',
    'nationality' => 'required|string|max:100',
    'municipality' => 'required|string|max:100',
    'barangay' => 'required|string|max:100',
    'block_number' => 'required|integer|min:1',
    'street' => 'required|string|max:255',
])]
class ThirdStep extends Component
{
    public $address;
    public $nationality;
    public $municipality;
    public $barangay;
    public $block_number;
    public $street;

    public function mountIfDataExist()
    {
        $data = \DB::table('address_details')->where('user_id', \Auth::user()->id)->first();

        if(is_null($data)) {
            $this->address = '';
            $this->nationality = '';
            $this->municipality = '';
            $this->barangay = '';
            $this->block_number = '';
            $this->street = '';

            return;
        }

        $this->address = $data->address;
        $this->nationality = $data->nationality;
        $this->municipality = $data->municipality;
        $this->barangay = $data->barangay;
        $this->block_number = $data->block_number;
        $this->street = $data->street;

    }



    public function submit()
    {
       $validatedData =  $this->validate();

        \App\Models\AddressDetails::updateOrCreate(
            [
                'user_id' => \Auth::user()->id,
            ], $validatedData);


        flash()->success('Address details saved successfully!');

        return redirect()->route('user.forms', [4]);
    }



    public function render()
    {

        $this->mountIfDataExist();

        return view('livewire.user.verification.third-step');
    }
}
