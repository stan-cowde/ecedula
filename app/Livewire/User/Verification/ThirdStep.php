<?php

namespace App\Livewire\User\Verification;

use Livewire\Attributes\Validate;
use Livewire\Component;

#[Validate([
    'address' => 'required|string|max:255',
    'birth_place' => 'required|string|max:255',
    'municipality' => 'required|string|max:100',
    'barangay' => 'required|string|max:100',
    'block_number' => 'required|integer|min:1',
    'street' => 'required|string|max:255',
])]
class ThirdStep extends Component
{
    public $address;
    public $municipality;
    public $barangay;
    public $block_number;
    public $street;
    public $birth_place;

    public function mountIfDataExist()
    {
        $data = \DB::table('address_details')->where('user_id', \Auth::user()->id)->first();

        if(is_null($data)) {
            $this->address = '';
            $this->birth_place = '';
            $this->municipality = '';
            $this->barangay = '';
            $this->block_number = '';
            $this->street = '';

            return;
        }

        $this->address = $data->address;
        $this->municipality = $data->municipality;
        $this->barangay = $data->barangay;
        $this->block_number = $data->block_number;
        $this->street = $data->street;
        $this->birth_place = $data->birth_place;

    }



    public function saveThirdStep()
    {
       $validatedData =  $this->validate();

      # dd($validatedData);

        \App\Models\AddressDetails::updateOrCreate(
            [
                'user_id' => \Auth::user()->id,
            ], $validatedData);


        flash()->success('Address details saved successfully!');

        return redirect()->route('user.forms', ['step' => '4']);
    }



    public function render()
    {

        $this->mountIfDataExist();

        return view('livewire.user.verification.third-step');
    }
}
