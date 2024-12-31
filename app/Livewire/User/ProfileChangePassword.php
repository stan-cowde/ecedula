<?php

namespace App\Livewire\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ProfileChangePassword extends Component
{

    public $current_password = '*******';
    public $new_password;
    public $renew_password;

    public function updatePassword()
    {
        $this->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8',
            'renew_password' => 'required|same:new_password',
        ]);

        if (!Hash::check($this->current_password, Auth::user()->password)) {
            $this->addError('current_password', 'The current password is incorrect.');
            flash()->error('The current password is incorrect.');
            return;
        }

        Auth::user()->update([
            'password' => Hash::make($this->new_password),
        ]);

        session()->flash('success', 'Password updated successfully.');
        flash()->success('Password updated successfully.');
        $this->reset(['current_password', 'new_password', 'renew_password']);
    }


    public function render()
    {
        return view('livewire.user.profile-change-password');
    }
}
