<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Attributes\Session;
use Livewire\Attributes\Validate;
use Livewire\Component;


#[Validate([
    'barangay' => 'required|string|max:255',
    'full_name' => 'required|string|max:255',
    'address' => 'required|string|max:255',
    'tin' => 'nullable|string|max:255',
    'height' => 'required|numeric',
    'weight' => 'required|numeric',
    'citizenship' => 'required|string|max:255',
    'icr_no' => 'nullable|string|max:255',
    'place_of_birth' => 'required|string|max:255',
    'date_of_birth' => 'required|date',
    'profession' => 'nullable|string|max:255',
    'gender' => 'required|in:MALE,FEMALE,OTHER',
    'civil_status' => 'required|in:SINGLE, MARRIED, WIDOWED, DIVORCED, SEPARATED',
    'annual_income' => 'numeric|min:5',
    'fee' => 'nullable|numeric',
    'isEmployedOrBusinessOwner' => 'boolean',
])]

class CreatePayment extends Component
{   public $full_name = '';
    public $address;
    public $tin;
    public $height;
    public $weight;
    public $citizenship = 'Filipino';
    public $icr_no;
    public $place_of_birth;
    public $date_of_birth = '';
    public $profession;
    #[Session]
    public $paymongo_fee;


    #[Session]
    public $barangay = 'Tres De Mayo';
    #[Session]
    public $gender = 'MALE';
    #[Session]
    public $civil_status = 'SINGLE';
    #[Session]
    public $annual_income = 0;
    #[Session]
    public $fee = 5;
    #[Session]
    public bool $isEmployedOrBusinessOwner = false;



    public function render()
    {
        $this->displayDataIfExists();

        return view('livewire.user.create-payment');
    }


    public function submit()
    {
        $this->validate();

       $cedula_number = uuid_create();

       #dd($validatedData);

        \DB::table('cedula_form')->updateOrInsert([

            'user_id' => \Auth::user()->id,
            'cedula_number' => $cedula_number,
            'annual_income' => $this->annual_income,
        ],[
            'barangay' => $this->barangay,
            'fullName' => $this->full_name,
            'address' => $this->address,
            'tin' => $this->tin,
            'height' => $this->height,
            'weight' => $this->weight,
            'citizenship' => $this->citizenship,
            'gender' => $this->gender,
            'civil_status' => $this->civil_status,
            'icr_no' => $this->icr_no,
            'place_of_birth' => $this->place_of_birth,
            'profession' => $this->profession,
            'fee' => $this->fee,
            'isEmployedOrBusinessOwner' => $this->isEmployedOrBusinessOwner,
        ]);

        redirect()->route('user.paymongo.checkout', [$this->fee]);
    }


    //////////////////////////////////[FUNCTION]//////////////////////////////

    function calculateIndividualCommunityTax()
    {
        // Basic community tax for individuals
        $communityTax = 5.00;

        // Check if the individual is required to pay community tax based on employment/business or property ownership
        if ($this->isEmployedOrBusinessOwner) {

            if (empty($this->annual_income)) {
                $this->annual_income = 0;
            }

            // Calculate additional community tax based on annual income
            $additionalTax = floor($this->annual_income / 1000) * 1.00;

            // Cap the additional tax at P5,000
            $additionalTax = min($additionalTax, 5000);

            // Add the additional tax to the basic community tax
            $communityTax += $additionalTax;
        }

        // Cap the total community tax at P5,005.00
        $this->fee = min($communityTax, 5005.00);

        // Calculate Paymongo service fee (2.9% + 15 pesos)
        $this->paymongo_fee = ($this->fee * 0.015) + 15;
    }

    public function displayDataIfExists()
    {
        $data =  User::join('personal_details', 'personal_details.user_id', '=', 'users.id')
                    ->join('identity_details', 'identity_details.user_id', '=', 'users.id')
                    ->join('family_details', 'family_details.user_id', '=', 'users.id')
                    ->join('address_details', 'address_details.user_id', '=', 'users.id')
                    ->where('users.id', \Auth::user()->id)
                    ->select([
                        'personal_details.last_name',
                        'personal_details.first_name',
                        'personal_details.middle_name',
                        'personal_details.gender',
                        'personal_details.citizenship',
                        'personal_details.date_of_birth',
                        'personal_details.civil_status',
                        'personal_details.height',
                        'personal_details.weight',
                        'identity_details.tin',
                        'identity_details.icr',
                        'identity_details.occupation',
                        'address_details.birth_place',
                        'address_details.address',
                        'address_details.municipality',
                        'address_details.barangay',
                    ])
                    ->first();

        if(! is_null($data)) {
            $this->barangay = $data['barangay'];
            $this->full_name = $data['first_name'] . ' ' . $data['middle_name'][0] . $data['last_name'];
            $this->address = $data['address'];
            $this->tin = $data['tin'];
            $this->height = $data['height'];
            $this->weight = $data['weight'];
            $this->citizenship =  $data['citizenship'];
            $this->icr_no = $data['icr'];
            $this->place_of_birth = $data['birth_place'];
            $this->date_of_birth =  $data['date_of_birth'];
            $this->profession = $data['occupation'];
            $this->gender = strtoupper($data['gender']);
            $this->civil_status  = $data['civil_status'];

            return;
        }

        $this->barangay = '';
        $this->full_name = '';
        $this->address = '';
        $this->tin = '';
        $this->height = '';
        $this->weight = '';
        $this->citizenship = 'Filipino';
        $this->icr_no = '';
        $this->place_of_birth = '';
        $this->date_of_birth = '2000-01-01';
        $this->profession = '';
        $this->annual_income = '';
    }
}
