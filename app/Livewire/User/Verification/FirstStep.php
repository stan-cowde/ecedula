<?php

namespace App\Livewire\User\Verification;

use App\Models\PersonalDetail;
use App\Models\Transaction;
use Livewire\Attributes\Validate;
use Livewire\Component;


#[Validate([
    'last_name' => 'required|string|max:255',
    'first_name' => 'required|string|max:255',
    'middle_name' => 'nullable|string|max:255',
    'gender' => 'required|in:male,female,other',
    'citizenship' => 'required|string|max:255',
    'date_of_birth' => 'required|date',
    'civil_status' => 'required|string|max:255',
    'height' => 'required|numeric|min:0',
    'weight' => 'required|numeric|min:0',
])]

class FirstStep extends Component
{

    public $last_name;
    public $first_name;
    public $middle_name;
    public $gender;
    public $citizenship;
    public $date_of_birth;
    public $civil_status;
    public $height;
    public $weight;


    public $data = [];


    public function mount()
    {
        $this->mountIfDataExist();
    }

    public function mountIfDataExist()
    {
        $this->data =  \App\Models\PersonalDetail::query()->where('pd_user_id', auth()->id())->first();

        if(! $this->data) {
            return [];
        }

        $this->last_name = $this->data['last_name'];
        $this->first_name = $this->data['first_name'];
        $this->middle_name = $this->data['middle_name'];
        $this->gender = $this->data['gender'];
        $this->citizenship = $this->data['citizenship'];
        $this->date_of_birth = $this->data['date_of_birth'];
        $this->civil_status = $this->data['civil_status'];
        $this->height = $this->data['height'];
        $this->weight = $this->data['weight'];
    }


    public function submit()
    {
        $validatedData = $this->validate();

        \App\Models\PersonalDetail::updateOrCreate(
            [
                'pd_user_id' => \Auth::user()->id
            ],
            $validatedData
        );

        flash()->success( 'Personal details saved successfully.');

        redirect()->route('user.forms', ['2']);
    }


    public function render()
    {
        return view('livewire.user.verification.first-step');
    }
}
