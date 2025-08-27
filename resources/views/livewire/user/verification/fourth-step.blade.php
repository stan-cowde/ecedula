<div>
    <form wire:submit.prevent="saveFourthStep">
        <div class="form first m-5">
            <div class="details personal">
                <div class="details ID">
                    <span class="title">Family Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Father Name</label>
                            <input type="text" wire:model="father_name" placeholder="Enter father name" required>
                            @error('father_name') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div class="input-field">
                            <label>Mother Name</label>
                            <input type="text" wire:model="mother_name" placeholder="Enter mother name" required>
                            @error('mother_name') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div class="input-field">
                            <label>Guardian Name</label>
                            <input type="text" wire:model="guardian_name" placeholder="Enter guardian name (optional)">
                            @error('guardian_name') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div class="input-field">
                            <label>Spouse Name</label>
                            <input type="text" wire:model="spouse_name" placeholder="Enter spouse name">
                            @error('spouse_name') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="buttons column-gap-3 justify-content-end">
                        <a href="{{ route('user.forms', ['step' => '3']) }}">
                            <div class="backBtn">
                                <i class="bi bi-arrow-right-circle"></i>
                                <span class="btnText">Back</span>
                            </div>
                        </a>
                        <button type="submit" class="nextBtn">
                            <span class="btnText">Next</span>
                            <i class="bi bi-arrow-right-circle"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
