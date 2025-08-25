<div>
    <form wire:submit.prevent="saveFirstStep">
        <div class="form first">
            <div class="details personal">
                <span class="title">Personal Details</span>

                <div class="fields">
                    <div class="input-field">
                        <label>Last Name</label>
                        <input wire:model="last_name" type="text" placeholder="Enter your Last name" required>
                        @error('last_name') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div class="input-field">
                        <label>First Name</label>
                        <input wire:model="first_name" type="text" placeholder="Enter First name" required>
                        @error('first_name') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div class="input-field">
                        <label>Middle Name</label>
                        <input wire:model="middle_name" type="text" placeholder="Enter Middle Name">
                        @error('middle_name') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div class="input-field">
                        <label>Gender</label>
                        <select wire:model="gender" required class="form-select form-select-lg mb-3">
                            <option value="" disabled>Choose a gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="other">Other</option>
                        </select>
                        @error('gender') <small class="error text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="input-field">
                        <label>Nationality</label>
                        <input wire:model="citizenship" type="text" placeholder="Enter your Citizenship" required>
                        @error('citizenship') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div class="input-field">
                        <label>Date of Birth</label>
                        <input wire:model="date_of_birth" type="date" placeholder="Enter birth date" required>
                        @error('date_of_birth') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div class="input-field">
                        <label>Civil Status</label>
                        <select class="form-control" id="civilStatus" wire:model="civil_status">
                            <option>Choose Your Civil Status</option>
                            <option value="SINGLE">SINGLE</option>
                            <option value="MARRIED">MARRIED</option>
                            <option value="WIDOWED">WIDOWED</option>
                            <option value="LEGALLY SEPARATED">LEGALLY SEPARATED</option>
                            <option value="DIVORCED">DIVORCED</option>
                        </select>
                        @error('civil_status') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div class="input-field">
                        <label>Height (CM)</label>
                        <input wire:model="height" type="number" placeholder="Enter your height (In Cm)" required>
                        @error('height') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div class="input-field">
                        <label>Weight</label>
                        <input wire:model="weight" type="number" placeholder="Enter your weight" required>
                        @error('weight') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="buttons" style="display: flex; justify-content: flex-end; margin-top: 20px;">
                    <button type="submit" class="nextBtn">
                        <span class="btnText">Next</span>
                        <i class="bi bi-arrow-right-circle"></i>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
