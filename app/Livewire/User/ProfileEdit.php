<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;


class ProfileEdit extends Component
{
    use WithFileUploads;

    public $profile_image;
    public $first_name;
    public $last_name;
    public $username;
    public $email;
    public $imagePreview;

    public function updatedProfileImage()
    {
        $this->validate([
            'profile_image' => 'image|max:2048', // 2MB Max
        ]);

        $this->imagePreview = $this->profile_image->temporaryUrl();
    }

    public function saveChanges()
    {
        $this->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'profile_image' => 'nullable|image|max:2048',
        ]);

        // Handle profile image upload
        if ($this->profile_image) {
            $profileImagePath = $this->profile_image->store('public/profile-images');
        }

        User::query()->update([
           'firstname' => $this->first_name,
           'lastname' => $this->last_name,
           'username' => $this->username,
           'email' => $this->email,
            'profile_image' => $profileImagePath,
        ]);

        // Save profile changes (implement logic to save data)
        flash()->success('Profile updated successfully.');
    }


    public function mountDataifExists()
    {
        $data = User::where('id', \Auth::user()->id)->first();

        if($this->profile_image){
            $this->imagePreview = $this->profile_image->temporaryUrl();
        }

        $this->first_name = $data->firstname;
        $this->last_name = $data->lastname;
        $this->username = $data->username;
        $this->email = $data->email;
        $this->profile_image = $data->profile_image;
    }


    public function render()
    {
        $this->mountDataifExists();

        return view('livewire.user.profile-edit');
    }
}
