<?php

namespace App\Livewire\User\Verification;

use App\Events\RefreshApplicants;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Validate([
    'father_name' => 'required|string|max:255',
    'mother_name' => 'required|string|max:255',
    'guardian_name' => 'nullable|string|max:255',
    'spouse_name' => 'nullable|string|max:255',
])]
class FourthStep extends Component
{

    public $father_name;
    public $mother_name;
    public $guardian_name;
    public $spouse_name;


    public function mountIfExists()
    {
        $data =  \App\Models\FamilyDetails::query()
                        ->where('fd_user_id', \Auth::user()->id)
                        ->get()
                        ->first();

        if ($data){

            $this->father_name = $data->father_name;
            $this->mother_name = $data->mother_name;
            $this->guardian_name = $data->guardian_name;
            $this->spouse_name = $data->spouse_name;

        }
    }



    public function submit()
    {
       $validated = $this->validate();

        \App\Models\FamilyDetails::updateOrCreate(
            [
                'fd_user_id' => \Auth::user()->id,
            ], $validated);


        \DB::table('application_request')->updateOrInsert([

            'ar_user_id' => \Auth::user()->id,

        ], [    'status' => 'Pending',
            'reviewed_by' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        // Process or store data here
        session()->flash('success', 'Family details have been saved successfully.');

        return redirect()->route('user.verification.pending');
    }

    public function render()
    {
        $this->mountIfExists();

        return view('livewire.user.verification.fourth-step');
    }
}
