<div>
    <div class="mb-3 d-flex align-items-center gap-2">
        <span>Search:</span>
        <input
            type="text"
            class="form-control w-25"
            placeholder="Search payor..."
            wire:model.live.debounce.500ms="search"
        >
        @if(!empty($search))
            <button type="button" class="btn btn-outline-secondary" wire:click="$set('search','')">Clear</button>
        @endif
    </div>

    <div class="table-responsive">
        <small><i class="text-secondary">Note: All of data in this table are used Receipts, Refer to Receipts Log Tab to show all receipts.</i></small>
        <table class="table table-bordered w-100">
            <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Serial Number</th>
                <th class="text-center">Payor</th>
                <th class="text-center">Particulars</th>
                <th class="text-center">Amount</th>
                <th class="text-center">Date</th>
                <th class="text-center">Used At</th>
            </tr>
            </thead>
            <tbody>
            @forelse($rows as $row)
                <tr wire:key="report-{{ $row->receipt_number }}-{{ $row->created_at }}">
                    <td class="text-center">{{ $rows->firstItem() + $loop->index }}</td>
                    <td class="text-center">#{{ $row->receipt_number }}</td>
                    <td class="text-center">{{ $row->payor }}</td>
                    <td class="text-center">{{ $row->particulars }}</td>
                    <td class="text-center">₱{{ number_format($row->amount, 2) }}</td>
                    <td class="text-center">{{ $row->created_at }}</td>
                    <td class="text-center">{{ \Carbon\Carbon::parse($row->created_at)->format('Y-m-d') }}</td>
                </tr>
            @empty
                <tr>
                    <td class="text-center" colspan="6">No records found.</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <div class="mt-3">
            {{ $rows->links() }}
        </div>
    </div>
</div>
