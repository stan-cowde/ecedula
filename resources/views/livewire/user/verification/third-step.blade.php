<div>
    <form wire:submit.prevent="saveThirdStep">
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
                            <label>Birth Place</label>
                            <input type="text" placeholder="Enter your Birth Place" wire:model="birth_place" required>
                            @error('birth_place') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div class="input-field">
                            <label>Municipality</label>
                            <input type="text" placeholder="Enter Municipality" wire:model="municipality" required>
                            @error('municipality') <span class="error">{{ $message }}</span> @enderror
                        </div>

                        <div class="input-field">
                            <label>Barangay</label>
                            <select wire:model="barangay" required>
                                <option value="">Select Barangay</option>
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
                                <option value="Kiagot">Kiagot</option>
                                <option value="Lungag">Lungag</option>
                                <option value="Mahayahay">Mahayahay</option>
                                <option value="Matti">Matti</option>
                                <option value="Pak-an">Pak-an</option>
                                <option value="Palindag">Palindag</option>
                                <option value="Ruparan">Ruparan</option>
                                <option value="San Jose">San Jose</option>
                                <option value="San Miguel">San Miguel</option>
                                <option value="Sinawilan">Sinawilan</option>
                                <option value="Soong">Soong</option>
                                <option value="Tres De Mayo">Tres De Mayo</option>
                                <option value="Zone 1">Zone 1</option>
                                <option value="Zone 2">Zone 2</option>
                                <option value="Zone 3">Zone 3</option>
                            </select>
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
                    </div>

                    <div class="buttons flex justify-content-end"
                         style="display: flex; justify-content: flex-end; gap: 10px;">
                        <a href="{{ route('user.forms', ['step' => '2']) }}">
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
