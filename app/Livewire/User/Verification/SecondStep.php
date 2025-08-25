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
    public $icr;
    public $monthly_income;
    public $imageStoragePath;

    public function isValidIdExists()
    {
        $identityDetails = \App\Models\IdentityDetails::where('user_id', \Auth::user()->id)->first();

        if ($identityDetails && $identityDetails->valid_id) {
            // Use a secure route to display the stored private image
            $this->imagePreview = route('user.identity.image', ['identity' => $identityDetails->id]);

        }
    }


    public function updatedUploadfile()
    {
        if (! $this->uploadfile) {
           return flash()->warning('Please select an image');
        }

        $this->imagePreview = $this->uploadfile->temporaryUrl();

        try {
            $this->validateOnly('uploadfile');
            // Store on local disk under "private" and keep relative path returned by Storage
            $path = $this->uploadfile->storeAs('private', $this->uploadfile->getClientOriginalName(), 'local');

            // Save relative path for DB (e.g., "private/filename.jpg")
            $this->imageStoragePath = $path;

            // For OCR, use the absolute filesystem path
            $filepath = storage_path('app/private/' . $path);
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

    public function saveSecondStep()
    {
        try {
            // Build validation rules dynamically so 'uploadfile' is only validated when it's an actual uploaded file
            $rules = [
                'id_number' => 'required|string',
                'occupation' => 'required|string',
                'tin' => 'nullable|string',
                'icr' => 'nullable|numeric',
                'monthly_income' => 'required|string',
            ];

            // Validate uploadfile only if it's an uploaded file (not a stored string path or null)
            if ($this->uploadfile instanceof \Livewire\Features\SupportFileUploads\TemporaryUploadedFile || $this->uploadfile instanceof \Illuminate\Http\UploadedFile) {
                $rules['uploadfile'] = 'image|max:1024';
            }

            $validatedData = $this->validate($rules);

            // Ensure we don't overwrite existing path with null
            $existing = IdentityDetails::where('user_id', \Auth::user()->id)->first();
            $pathToSave = $this->imageStoragePath ?: ($existing->valid_id ?? null);

            \App\Models\IdentityDetails::updateOrCreate(
                [
                    'user_id' => \Auth::user()->id,
                ],
                [
                    'valid_id' => $pathToSave,
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
            return redirect()->route('user.forms', ['step' => '3']);

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

    }

    private function mountModelsIfExist()
    {
        $data = IdentityDetails::where('user_id', \Auth::user()->id)->first();

        if ($data) {
            $this->id_number = $data['id_number'];
            $this->occupation = $data['occupation'];
            $this->tin = $data['tin'];
            $this->icr = $data['icr'];
            $this->monthly_income = $data['monthly_income'];
        }
        else
        {
            $this->id_number = '';
            $this->occupation = '';
            $this->tin = '';
            $this->icr = '';
            $this->monthly_income = '';
        }
    }

    public function render()
    {
        $this->mountModelsIfExist();

        $this->isValidIdExists();

        return view('livewire.user.verification.second-step');
    }
}
