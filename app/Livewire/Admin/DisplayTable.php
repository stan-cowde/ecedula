<?php

namespace App\Livewire\Admin;

use Illuminate\Routing\Route;
use Livewire\Component;

class DisplayTable extends Component
{

    public $rows = [];
    private $decision = '';

    public function mount($decision)
    {
        $this->decision = $decision;
    }

    public function fetchTableByRouteName(): void
    {
        if(! in_array ($this->decision, ["Approved", "Denied"])){
            abort(404, 'Decision not found');
        }

        if ($this->decision === "Approved") {

                $this->rows = \DB::table("application_request")
                                    ->join("users", "users.id", "application_request.user_id")
                                    ->join("address_details", "address_details.user_id", "application_request.user_id")
                                    ->join("family_details", "family_details.user_id", "application_request.user_id")
                                    ->join("identity_details", "identity_details.user_id", "application_request.user_id")
                                    ->join("personal_details", "personal_details.user_id", "application_request.user_id")
                                    ->where('application_request.status', 'Approved')
                                    ->select([
                                        "application_request.*",
                                        'users.id',
                                        'users.firstname',
                                        'users.lastname',
                                        'users.username',
                                        'users.email'
                                    ])
                                    ->get();

        } else if ($this->decision === "Denied") {

                $this->rows = \DB::table("application_request")
                                    ->join("users", "users.id", "application_request.user_id")
                                    ->join("address_details", "address_details.user_id", "application_request.user_id")
                                    ->join("family_details", "family_details.user_id", "application_request.user_id")
                                    ->join("identity_details", "identity_details.user_id", "application_request.user_id")
                                    ->join("personal_details", "personal_details.user_id", "application_request.user_id")
                                    ->where('application_request.status', 'Denied')
                                    ->select([
                                        "application_request.*",
                                        'users.id',
                                        'users.firstname',
                                        'users.lastname',
                                        'users.username',
                                        'users.email'
                                    ])
                                    ->get();
        }

    }


    public function render()
    {
        $this->fetchTableByRouteName();

        return view('livewire.admin.display-table');
    }
}
