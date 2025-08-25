<?php

namespace App\Livewire\User;

use Livewire\Component;

class StepWizard extends Component
{

    public int $step = 1;

    public function mount()
    {

    }

    public function render()
    {
        return view('livewire.user.step-wizard');
    }
}
