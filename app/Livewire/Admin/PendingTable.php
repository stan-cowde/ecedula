<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\On;
use Livewire\Component;

class PendingTable extends Component
{

    public $rows = [];


    public function render()
    {
        $this->fetchApplicantRequest();

        $rows = $this->rows;

        #dd($rows);
        return view('livewire.admin.pending-table', compact('rows'));
    }


    public function fetchApplicantRequest()
    {

        $this->rows = \DB::table("application_request")
                            ->join("users", "users.id", "application_request.user_id")
                            ->join("address_details", "address_details.user_id", "application_request.user_id")
                            ->join("family_details", "family_details.user_id", "application_request.user_id")
                            ->join("identity_details", "identity_details.user_id", "application_request.user_id")
                            ->join("personal_details", "personal_details.user_id", "application_request.user_id")
                            ->where('application_request.status', 'Pending')
                            ->where('users.verified', 0)
                            ->select([
                                "application_request.id as request_id",
                                'users.*',
                                'address_details.*',
                                "family_details.*",
                                "identity_details.*",
                                "personal_details.*",

                            ])
                            ->get();
        #dd($this->rows);
    }


    #decision function
    public function DecisionApplicantRequest($status, $id)
    {

        $user_id = \DB::table('application_request')->where('id', $id)->value('user_id');

        #dd($user_id, $id);

        if ($status == 'Approved') {

            \DB::transaction(function () use ($id, $user_id) {
                // Update the application_request record
                \DB::table('application_request')
                    ->where('id', $id)
                    ->where('status', 'Pending')
                    ->update([
                        'status' => 'Approved',
                        'reviewed_by' => \Auth::user()->id,
                        'updated_at' => now(),
                    ]);

                // Update the related user's verified flag
                if ($user_id) {
                    \DB::table('users')->where('id', $user_id)->update(['verified' => 1]);
                }
            });

            flash()->success('Applicant Approved!');

        }else if ($status == 'rejected') {

            \DB::transaction(function () use ($id, $user_id) {
                // Update the application_request record
                \DB::table('application_request')
                    ->where('id', $id)
                    ->where('status', 'Pending')
                    ->update([
                        'status' => 'Denied',
                        'reviewed_by' => \Auth::user()->id,
                        'updated_at' => now(),
                    ]);

                // Update the related user's verified flag
                if ($user_id) {
                    \DB::table('users')->where('id', $user_id)->update(['verified' => 0]);
                }
            });

            flash()->error('Applicant Denied!');

        }else
        {
            abort(404, "Something went wrong");
        }
    }

}
