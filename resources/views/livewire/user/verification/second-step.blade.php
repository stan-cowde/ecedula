<div>
    <form wire:submit.prevent="submit" enctype="multipart/form-data">
        <div class="form first">

            <div
                x-data="{ uploading: false, progress: 0 }"
                x-on:livewire-upload-start="uploading = true"
                x-on:livewire-upload-finish="uploading = false"
                x-on:livewire-upload-cancel="uploading = false"
                x-on:livewire-upload-error="uploading = false"
                x-on:livewire-upload-progress="progress = $event.detail.progress"
            >


            <div class="details personal">
                <div class="details ID">
                    <span class="title">Identity Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Valid ID</label>
                            @if ($imagePreview)
                                <img src="{{ $imagePreview }}" alt="Image Preview" style="max-width: 100px; max-height: 100px;">
                            @endif
                            <input type="file" wire:model="uploadfile" name="uploadfile">
                            @error('uploadfile') <span class="error">{{ $message }}</span> @enderror
                            <!-- Progress Bar -->
                            <div x-show="uploading">
                                <progress max="100" x-bind:value="progress"></progress>
                            </div>
                        </div>

                        <div class="input-field">
                            <label>ID Number</label>
                            <input type="text" wire:model="id_number" placeholder="Enter ID number" required>
                            @error('id_number') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div class="input-field">
                            <label>Occupation</label>
                            <input type="text" wire:model="occupation" placeholder="Enter Occupation" required>
                            @error('occupation') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div class="input-field">
                            <label>TIN Number (optional)</label>
                            <input type="text" wire:model="tin" placeholder="Enter TIN Number">
                            @error('tin') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div class="input-field">
                            <label>Place of Birth</label>
                            <input type="text" wire:model="place_of_birth" placeholder="Enter Place of Birth" required>
                            @error('place_of_birth') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div class="input-field">
                            <label>ICR NO. (if an alien)</label>
                            <input type="number" wire:model="icr" placeholder="Enter ICR">
                            @error('icr') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div class="input-field">
                            <label>Gross Monthly Income (for employed)</label>
                            <select wire:model="monthly_income" required>
                                <option value="" disabled selected>Select Income Range</option>
                                <option value="5,000 - 10,000">5,000 - 10,000</option>
                                <option value="10,000 - 15,000">10,000 - 15,000</option>
                                <option value="15,000 - 20,000">15,000 - 20,000</option>
                                <option value="20,000 or more">20,000 or more</option>
                            </select>
                            @error('monthly_income') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div class="buttons" style="display: flex; justify-content: space-between;">
                            <a href="{{ route('user.forms', [1]) }}" class="backBtn">
                                <i class="bi bi-arrow-left-circle"></i>
                                <span class="btnText">Back</span>
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
