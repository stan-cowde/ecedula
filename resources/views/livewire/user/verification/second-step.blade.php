<div id="step-2">
    <form wire:submit.prevent="saveSecondStep" enctype="multipart/form-data">
        <div class="form first">

            <div
                x-data="{ uploading: false, progress: 0 }"
                x-on:livewire-upload-start="uploading = true"
                x-on:livewire-upload-finish="uploading = false"
                x-on:livewire-upload-cancel="uploading = false"
                x-on:livewire-upload-error="uploading = false"
                x-on:livewire-upload-progress="progress = $event.detail.progress"
            >
                <div class="details">
                    <div class="d-flex flex-column justify-content-center h-25 w-50">
                        <!-- Image Upload Card -->
                        <div class="card mb-4 h-70 w-50">
                            <div class="card-body">
                                <div class="input-field">
                                    <label>Valid ID</label>
                                    @if ($imagePreview)
                                        <img src="{{ $imagePreview }}" alt="Image Preview" class="img-fluid">
                                    @else
                                        <div class="border rounded p-4 text-center" style="min-height: 100px;">
                                            <i class="bi bi-cloud-upload fs-1"></i>
                                            <p class="mt-2">Upload ID Image</p>
                                        </div>
                                    @endif
                                    <input type="file" wire:model="uploadfile" name="uploadfile"
                                           class="form-control mt-2">
                                    @error('uploadfile') <span class="error">{{ $message }}</span> @enderror
                                    <!-- Progress Bar -->
                                    <div x-show="uploading">
                                        <progress max="100" x-bind:value="progress"></progress>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="details personal">
                        <div class="details ID">
                            <span class="title">Identity Details</span>
                            <!-- Form Fields -->
                            <div class="col">
                                <div class="fields">
                                    <div class="input-field">
                                        <label>ID Number</label>
                                        <input type="text" wire:model="id_number" placeholder="Enter ID number"
                                               required>
                                        @error('id_number') <span class="error">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="input-field">
                                        <label>Occupation</label>
                                        <input type="text" wire:model="occupation" placeholder="Enter Occupation"
                                               required>
                                        @error('occupation') <span class="error">{{ $message }}</span> @enderror
                                    </div>

                                    <div class="input-field">
                                        <label>TIN Number (optional)</label>
                                        <input type="text" wire:model="tin" placeholder="Enter TIN Number">
                                        @error('tin') <span class="error">{{ $message }}</span> @enderror
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
                                        <a href="{{ route('user.forms', ['step' => '1']) }}" class="backBtn w-50 p-3">
                                            <i class="bi bi-arrow-left-circle"></i>
                                            <span class="btnText">Back</span>
                                        </a>
                                        <button type="submit" class="nextBtn w-50 p-3">
                                            <span class="btnText">Next</span>
                                            <i class="bi bi-arrow-right-circle"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
