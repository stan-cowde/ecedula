<div>
    <div class="table-responsive">
        <table class="table table-bordered w-100" id="dataTable2">
            <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Serial Number From</th>
                <th class="text-center">Serial Number To</th>
                <th class="text-center">Receipts Left</th>
                <th class="text-center">Receipts Used</th>
                <th class="text-center">Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse($rows as $index => $row)
                <tr>
                    <td class="text-center">{{ $rows->firstItem() + $index }}</td>
                    <td class="text-center">#{{ $row->serial_number_from }}</td>
                    <td class="text-center">#{{ $row->serial_number_to }}</td>
                    <td class="text-center">{{ $this->countReceiptsLeft($row->id) }}</td>
                    <td class="text-center">{{ $this->countReceiptsUsed($row->id) }}</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-primary" wire:click="edit({{ $row->id }})">Edit</button>
                        <button class="btn btn-sm btn-error" wire:click="delete({{ $row->id }})">Delete</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="text-center" colspan="6">No serial numbers found.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            {{ $rows->links() }}
        </div>
    </div>

    {{-- Edit Modal (daisyUI) --}}
    @include('livewire.admin.modal.EditSerialNumberModal')


    {{-- Delete Confirmation Modal (daisyUI) --}}
    <!-- AlpineJS Dialog Modal -->
    <div x-data="{ showDeleteModal: @entangle('showDeleteModal') }" x-cloak>
        <dialog :class="showDeleteModal ? 'modal modal-open' : 'modal'">
            <div class="modal-box">
                <form>
                    <h3 class="font-bold text-lg mb-4">Deactivate Serial Number Range</h3>
                    <p>This will not delete the record, It will set this as <span class="font-semibold">Inactive</span> so it no longer appears in the list and the remaining will not be used. <span class="font-semibold">Proceed?</span></p>
                    <div class="modal-action">
                    <!-- Modal Footer -->
                    <div class="modal-action">
                        <button type="button" class="btn" @click="showDeleteModal = false">Close</button>
                        <button wire:click="deactivate" type="button" class="btn btn-error">Mark as Closed</button>
                    </div>
                </form>
            </div>
        </dialog>
    </div>






</div>
