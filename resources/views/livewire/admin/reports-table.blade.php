    <div class="table-responsive">
        <table class="table table-bordered w-100" id="dataTable">
            <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Serial Number</th>
                <th class="text-center">Payor</th>
                <th class="text-center">Particulars</th>
                <th class="text-center">Amount</th>
            </tr>
            </thead>
            <tbody>
            @forelse($rows as $index => $row)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>#{{ $row->serial_number }}</td>
                    <td>{{ $row->payor }}</td>
                    <td>{{ $row->particulars }}</td>
                    <td>₱{{ number_format($row->amount, 2) }}</td>
                </tr>
            @empty

            @endforelse
            </tbody>
        </table>
    </div>
