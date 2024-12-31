<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateAccountModals extends Component
{

    #[Validate('required|max:100')]
    public $firstname = '';

    #[Validate('required|max:100')]
    public $lastname = '';

    #[Validate('required|email|max:50|unique:users,email')]
    public $email = '';

    #[Validate('required|max:50|unique:users,username')]
    public $username = '';

    #[Validate('required|min:6|max:255')]
    public $password = '';

    #[Validate('required|in:1,2')]
    public $role = '';

    public $isOpen = false;


    public function render()
    {
        return view('livewire.admin.create-account-modals');
    }

    public function createAccount()
    {
        $data = $this->validate();

        User::query()->create($data);

        $this->reset();

        $this->isOpen = false;

        flash()->success('Account created successfully!');
    }


    public function open() {
        $this->isOpen = true;
    }

    public function close() {
        $this->isOpen = false;
    }

}
