<div x-data="{ isOpen: @entangle('isOpen') }">
    <!-- Button to open the modal -->
    <button @click="isOpen = true" class="btn btn-neutral mb-3">
        <i class="fa fa-hashtag"></i>
        Add Serial Number Receipt
    </button>

    <!-- Modal -->
    <dialog :class="isOpen ? 'modal modal-open' : 'modal'">
        <div class="modal-box">
            <form>
                <!-- Modal Header -->
                <div class="flex justify-between items-center border-b pb-2 mb-4">
                    <h5 class="text-lg font-bold">Add Serial Number Receipt</h5>
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
                </div>

                <!-- Modal Footer -->
                <div class="modal-action">
                    <button type="button" class="btn" @click="isOpen = false">Close</button>
                    <button wire:click="addSerialNumberReceipt" type="button" class="btn btn-primary">Add Serial Number Receipt</button>
                </div>
            </form>
        </div>
    </dialog>
</div>
