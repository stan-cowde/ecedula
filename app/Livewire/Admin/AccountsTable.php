<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\On;
use Livewire\Component;


class AccountsTable extends Component
{

    public $rows = [];
    public $delete_id = 0;


    public function render()
    {
        $this->fetchAccounts();

        return view('livewire.admin.accounts-table');
    }


    //////////////////////////[FUNCTIONS]///////////////////////////////
    public function fetchAccounts()
    {
        $this->rows = \DB::table('users')->select('id','firstname', 'lastname', 'username', 'email')->get();
    }

    public function deleteUser($id)
    {
        $this->delete_id = $id;

        sweetalert()
            ->showDenyButton()
            ->info('Are you sure you want to delete the user ?');
    }

    #[On('sweetalert:confirmed')]
    public function onConfirmed(array $payload): void
    {
        \DB::table('users')->where('id', $this->delete_id)->delete();
        \DB::table('transactions')->where('tr_user_id', $this->delete_id)->delete();
        \DB::table('personal_details')->where('pd_user_id', $this->delete_id)->delete();
        \DB::table('identity_details')->where('id_details_user_id', $this->delete_id)->delete();
        \DB::table('family_details')->where('fd_user_id', $this->delete_id)->delete();
        \DB::table('cedula_form')->where('cf_user_id', $this->delete_id)->delete();
        \DB::table('application_request')->where('ar_user_id', $this->delete_id)->delete();
        \DB::table('address_details')->where('ad_user_id', $this->delete_id)->delete();

        flash()->info('User successfully deleted.');
    }

    #[On('sweetalert:denied')]
    public function onDeny(array $payload): void
    {
        flash()->info('Deletion cancelled.');
    }



}
