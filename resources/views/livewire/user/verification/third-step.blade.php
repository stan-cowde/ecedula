<div>
    <form wire:submit.prevent="submit">
        <div class="form first">
            <div class="details personal">
                <div class="details address">
                    <span class="title">Address Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Address</label>
                            <input type="text" placeholder="Enter your address" wire:model="address" required>
                            @error('address') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div class="input-field">
                            <label>Citizenship</label>
                            <input type="text" placeholder="Enter Nationality" wire:model="nationality" required>
                            @error('nationality') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div class="input-field">
                            <label>Municipality</label>
                            <input type="text" placeholder="Enter Municipality" wire:model="municipality" required>
                            @error('municipality') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div class="input-field">
                            <label>Barangay</label>
                            <input type="text" placeholder="Enter your Barangay" wire:model="barangay" required>
                            @error('barangay') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div class="input-field">
                            <label>Block Number</label>
                            <input type="number" placeholder="Enter Block Number" wire:model="block_number" required>
                            @error('block_number') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div class="input-field">
                            <label>Street</label>
                            <input type="text" placeholder="Enter your Street" wire:model="street" required>
                            @error('street') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div class="buttons column-gap-3" style="justify-content: space-between;">
                            <a href="{{ route('user.forms', [2]) }}">
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
        </div>
    </form>
</div>
