<div x-data="{ isOpen: @entangle('isOpen') }">
    <!-- Button to open the modal -->
    <button @click="isOpen = true" class="btn btn-accent mb-3">
        <i class="fa fa-money-check"></i>
        Create a Collection Deposit
    </button>

    <!-- Modal -->
    <dialog :class="isOpen ? 'modal modal-open' : 'modal'">
        <div class="modal-box">
            <form>
                <!-- Modal Header -->
                <div class="flex justify-between items-center border-b pb-2 mb-4">
                    <h5 class="text-lg font-bold">Create Collection Deposit</h5>
                    <button type="button" class="btn btn-sm btn-circle" @click="isOpen = false">
                        ✕
                    </button>
                </div>

                <!-- Modal Body -->
                <div class="space-y-4">
                    <div class="flex gap-2">
                        <label class="input input-bordered flex items-center gap-6">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-4">
                                <path fill-rule="evenodd" d="M9.493 2.852a.75.75 0 0 0-1.486-.204L7.545 6H4.198a.75.75 0 0 0 0 1.5h3.14l-.69 5H3.302a.75.75 0 0 0 0 1.5h3.14l-.435 3.148a.75.75 0 0 0 1.486.204L7.955 14h2.986l-.434 3.148a.75.75 0 0 0 1.486.204L12.456 14h3.346a.75.75 0 0 0 0-1.5h-3.14l.69-5h3.346a.75.75 0 0 0 0-1.5h-3.14l.435-3.148a.75.75 0 0 0-1.486-.204L12.045 6H9.059l.434-3.148ZM8.852 7.5l-.69 5h2.986l.69-5H8.852Z" clip-rule="evenodd" />
                            </svg>
                            <input wire:model="serial_number_from" type="text" class="grow text-sm" placeholder="Serial Number (From)" />
                        </label>
                        <label class="input input-bordered flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-4">
                                <path fill-rule="evenodd" d="M9.493 2.852a.75.75 0 0 0-1.486-.204L7.545 6H4.198a.75.75 0 0 0 0 1.5h3.14l-.69 5H3.302a.75.75 0 0 0 0 1.5h3.14l-.435 3.148a.75.75 0 0 0 1.486.204L7.955 14h2.986l-.434 3.148a.75.75 0 0 0 1.486.204L12.456 14h3.346a.75.75 0 0 0 0-1.5h-3.14l.69-5h3.346a.75.75 0 0 0 0-1.5h-3.14l.435-3.148a.75.75 0 0 0-1.486-.204L12.045 6H9.059l.434-3.148ZM8.852 7.5l-.69 5h2.986l.69-5H8.852Z" clip-rule="evenodd" />
                            </svg>
                            <input wire:model="serial_number_to" type="text" class="grow text-sm" placeholder="Serial Number (To)" />
                        </label>
                    </div>
                    @error('serial_number')
                    <span class="text-error text-sm">{{ $message }}</span>
                    @enderror
                    <label class="input input-bordered flex items-center gap-2">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 16 16"
                            fill="currentColor"
                            class="h-4 w-4 opacity-70">
                            <path
                                d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z" />
                        </svg>
                        <input wire:model="payor" type="text" class="grow" placeholder="Payor Name" />
                    </label>
                    @error('payor')
                    <span class="text-error text-sm">{{ $message }}</span>
                    @enderror
                    <select class="select select-primary w-full max-w-s" wire:model="particulars">
                        <option disabled selected>What Particulars?</option>
                        <option value="CTC">CTC</option>
                    </select>
                    @error('particulars')
                    <span class="text-error text-sm">{{ $message }}</span>
                    @enderror
                    <label class="input input-bordered flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                            <path d="M3 1.25a.75.75 0 0 0 0 1.5h.25v2.5a.75.75 0 0 0 1.5 0V2A.75.75 0 0 0 4 1.25H3ZM2.97 8.654a3.5 3.5 0 0 1 1.524-.12.034.034 0 0 1-.012.012L2.415 9.579A.75.75 0 0 0 2 10.25v1c0 .414.336.75.75.75h2.5a.75.75 0 0 0 0-1.5H3.927l1.225-.613c.52-.26.848-.79.848-1.371 0-.647-.429-1.327-1.193-1.451a5.03 5.03 0 0 0-2.277.155.75.75 0 0 0 .44 1.434ZM7.75 3a.75.75 0 0 0 0 1.5h9.5a.75.75 0 0 0 0-1.5h-9.5ZM7.75 9.25a.75.75 0 0 0 0 1.5h9.5a.75.75 0 0 0 0-1.5h-9.5ZM7.75 15.5a.75.75 0 0 0 0 1.5h9.5a.75.75 0 0 0 0-1.5h-9.5ZM2.625 13.875a.75.75 0 0 0 0 1.5h1.5a.125.125 0 0 1 0 .25H3.5a.75.75 0 0 0 0 1.5h.625a.125.125 0 0 1 0 .25h-1.5a.75.75 0 0 0 0 1.5h1.5a1.625 1.625 0 0 0 1.37-2.5 1.625 1.625 0 0 0-1.37-2.5h-1.5Z" />
                        </svg>
                        <input wire:model="amount" type="number" class="grow" placeholder="Amount" />
                    </label>
                    @error('amount')
                    <span class="text-error text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Modal Footer -->
                <div class="modal-action">
                    <button type="button" class="btn" @click="isOpen = false">Close</button>
                    <button wire:click="save" type="button" class="btn btn-primary">Create Collection Deposit</button>
                </div>
            </form>
        </div>
    </dialog>
</div>
