<div>
    <form wire:submit.prevent="submit">
        <div class="row">
            <!-- Left Column: Basic Personal Information -->
            <div class="col-md-4">
                <div class="form-group mb-3">
                    <label for="annualIncome">
                        Annual Income
                        <span data-bs-toggle="tooltip" data-bs-placement="top" title="Do not put comma (,) on the input amount.">
                            <i class="bi bi-question-circle"></i>
                        </span>
                    </label>
                    <div class="input-group">
                        <span class="input-group-text">₱</span>
                        <input type="text" class="form-control" wire:model="annual_income" wire:keyup="calculateIndividualCommunityTax">
                        @error('annual_income') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="isEmployedOrBusinessOwner">Employee/Business Owner?</label>
                    <span data-bs-toggle="tooltip" data-bs-placement="top" title="Income regardless of whether from business, exercise of profession, or from property.">
                        <i class="bi bi-question-circle"></i>
                    </span>
                    <div class="form-check">
                        <input
                            type="checkbox"
                            class="form-check-input"
                            id="isEmployedOrBusinessOwner"
                            wire:model="isEmployedOrBusinessOwner"
                            wire:change="calculateIndividualCommunityTax"
                        >
                        <label class="form-check-label" for="isEmployedOrBusinessOwner">Yes</label>
                        @error('isEmployedOrBusinessOwner') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="fee">Total Fee Income</label>
                    <div class="input-group">
                        <span class="input-group-text">₱</span>
                        <input type="text" class="form-control" wire:model="fee" disabled>
                        @error('fee') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="form-group mb-3">
                    <h4>Payment Summary</h4>
                    <p>Total income fee: <span wire:text="fee"></span></p>
                    <p>Service Fee:
                        <span data-bs-toggle="tooltip" data-bs-placement="top" title="Service fee that Paymongo charges for processing payments.">
                            <i class="bi bi-question-circle"></i>
                        </span>
                        <span wire:text="paymongo_fee"></span>
                    </p>
                </div>
            </div>

            <!-- Vertical Separator -->
            <div class="col-md-1 d-flex justify-content-center">
                <div style="border-left: 1px solid #ccc; height: 100%;"></div>
            </div>

            <!-- Right Column: Payment Details -->
            <div class="col-md-6">
                <div class="form-floating form-group mb-4">
                    <select wire:model="barangay" class="form-select form-select-sm" id="floatingSelect" aria-label="Select barangay" required>
                        <option selected>Select Barangay</option>
                        <option value="Aplaya">Aplaya</option>
                        <option value="Balabag">Balabag</option>
                        <option value="Binaton">Binaton</option>
                        <option value="Cogon">Cogon</option>
                        <option value="Colorado">Colorado</option>
                        <option value="Dawis">Dawis</option>
                        <option value="Dulangan">Dulangan</option>
                        <option value="Goma">Goma</option>
                        <option value="Igpit">Igpit</option>
                        <option value="Kapatagan">Kapatagan</option>
                        <option value="Lungag">Lungag</option>
                        <option value="Mahayahay">Mahayahay</option>
                        <option value="Matti">Matti</option>
                        <option value="Pandanon">Pandanon</option>
                        <option value="San Agustin">San Agustin</option>
                        <option value="San Jose">San Jose</option>
                        <option value="San Miguel">San Miguel</option>
                        <option value="San Roque">San Roque</option>
                        <option value="Sinawilan">Sinawilan</option>
                        <option value="Soong">Soong</option>
                        <option value="Tiguman">Tiguman</option>
                        <option value="Tres De Mayo">Tres De Mayo</option>
                        <option value="Zone 1">Zone 1</option>
                        <option value="Zone 2">Zone 2</option>
                        <option value="Zone 3">Zone 3</option>
                    </select>
                    <label for="floatingSelect">What barangay are you paying?</label>
                    @error('barangay') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group mb-4">
                    <label for="fullName">Full Name (Surname, Firstname Middlename)</label>
                    <input type="text" class="form-control" id="fullName" wire:model="full_name" disabled>
                </div>

                <div class="form-group mb-4">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" wire:model="address" placeholder="Address" disabled>
                    @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-row d-flex gap-3 mb-4">
                    <div class="form-group col-md-6">
                        <label for="tin">Tax Identification No. (TIN)</label>
                        <input type="text" class="form-control" id="tin" wire:model="tin" placeholder="TIN">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="height">Height (cm)</label>
                        <input type="number" class="form-control" id="height" wire:model="height" placeholder="Height">
                        @error('height') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="weight">Weight (kg)</label>
                        <input type="number" class="form-control" id="weight" wire:model="weight" placeholder="Weight">
                        @error('weight') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="form-group mb-4">
                    <label for="placeOfBirth">Place of Birth</label>
                    <input type="text" class="form-control" id="placeOfBirth" wire:model="place_of_birth" placeholder="Place of Birth" disabled>
                    @error('place_of_birth') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group mb-4">
                    <label for="dateOfBirth">Date of Birth (mm/dd/yyyy):</label>
                    <input type="date" class="form-control" id="dateOfBirth" wire:model="date_of_birth" disabled>
                </div>

                <div class="form-group mb-4">
                    <label for="profession">Profession or Occupation</label>
                    <input type="text" class="form-control" id="profession" wire:model="profession" placeholder="Profession or Occupation" disabled>
                </div>

                <div class="form-row d-flex gap-3 mb-4">
                    <div class="form-group col-md-6">
                        <label for="gender">Gender</label>
                        <select class="form-control" id="gender" wire:model="gender">
                            <option>Choose Your Gender</option>
                            <option value="MALE">MALE</option>
                            <option value="FEMALE">FEMALE</option>
                            <option value="OTHER">OTHER</option>
                        </select>
                        @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="civilStatus">Civil Status</label>
                        <select class="form-control" id="civilStatus" wire:model="civil_status">
                            <option>Choose Your Civil Status</option>
                            <option value="SINGLE">SINGLE</option>
                            <option value="MARRIED">MARRIED</option>
                            <option value="WIDOWED">WIDOWED</option>
                            <option value="LEGALLY SEPARATED">LEGALLY SEPARATED</option>
                            <option value="DIVORCED">DIVORCED</option>
                        </select>
                        @error('civil_status') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>

        </div>

        <div class="d-flex justify-content-end card-footer">
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </div>
    </form>
</div>
