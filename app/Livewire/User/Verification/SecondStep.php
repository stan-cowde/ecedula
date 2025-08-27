<?php

namespace App\Livewire\User\Verification;

use App\Models\IdentityDetails;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;
use Livewire\Component;
use App\Services\OCR\ocralgorithm;
use Illuminate\Validation\ValidationException;

#[Validate([
    'uploadfile' => 'image|max:1024',
    'id_number' => 'required|string',
    'occupation' => 'required|string',
    'tin' => 'nullable|string',
    'place_of_birth' => 'required|string',
    'icr' => 'nullable|numeric',
    'monthly_income' => 'required|string',

])]
class SecondStep extends Component
{
    use WithFileUploads;

    public $uploadfile;
    public $imagePreview;
    public $id_number;
    public $occupation;
    public $tin;
    public $place_of_birth;
    public $icr;
    public $monthly_income;
    public $imageStoragePath;


    public function updatedUploadfile()
    {
        if ($this->uploadfile) {
            $this->imagePreview = $this->uploadfile->temporaryUrl();
        }

        try {
            $this->validateOnly('uploadfile'); // Validate only the uploadfile
            $path = $this->uploadfile->storeAs('public/uploads', $this->uploadfile->getClientOriginalName());
            $this->imageStoragePath = $this->uploadfile->getRealPath();

            $filepath = storage_path('app/' . $path);
            $this->processImage($filepath);
        } catch (ValidationException $e) {
            foreach ($e->errors() as $field => $messages) {
                foreach ($messages as $message) {
                    flash()->error($message);
                }
            }
            $this->reset('uploadfile'); // Clear the invalid file input
            $this->imagePreview = null;
        }
    }

    public function submit()
    {
        try {
            $validatedData = $this->validate();

            \App\Models\IdentityDetails::updateOrCreate(
                [
                    'id_details_user_id' => \Auth::user()->id,
                ],
                [
                    'valid_id' => $this->imageStoragePath,
                    'place_of_birth' => $this->place_of_birth,
                    'tin' => $this->tin,
                    'icr' => $this->icr,
                    'monthly_income' => $this->monthly_income,
                    'id_number' => $this->id_number,
                    'occupation' => $this->occupation,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );

            flash()->success('Identity Details Saved Successfully');
            return redirect()->route('user.forms', [3]);

        } catch (ValidationException $e) {
            foreach ($e->errors() as $field => $messages) {
                foreach ($messages as $message) {
                    flash()->error($message);
                }
            }
        }
    }

    private function processImage($imagePath)
    {
        // Initialize the OCR API client
        $ocr = new OcrAlgorithm();

        // Perform OCR on the image
        $data = $ocr->ocrSpaceFile($imagePath);

        if(! $data){
            return flash()->warning('Ocr failed to process image');
        }

        $this->id_number = $data['id_number'];
        $this->place_of_birth = $data['address'];

    }

    private function mountModelsIfExist()
    {
        $data = IdentityDetails::where('id_details_user_id', \Auth::user()->id)->first();

        if ($data) {
            $this->id_number = $data['id_number'];
            $this->occupation = $data['occupation'];
            $this->tin = $data['tin'];
            $this->place_of_birth = $data['place_of_birth'];
            $this->icr = $data['icr'];
            $this->monthly_income = $data['monthly_income'];
        }
        else
        {
            $this->id_number = '';
            $this->occupation = '';
            $this->tin = '';
            $this->place_of_birth = '';
            $this->icr = '';
            $this->monthly_income = '';
        }


    }

    public function render()
    {
        $this->mountModelsIfExist();

        return view('livewire.user.verification.second-step');
    }
}
