<div>
    <table class="table datatable table-striped">
        <thead>
        <tr>
            <th>
                <b>Transaction Code</b>
            </th>
            <th>Amount</th>
            <th>Status</th>
            <th data-type="date" data-format="YYYY/DD/MM">Start Date</th>
        </tr>
        </thead>
        <tbody>
        @forelse($results as $result)
            <tr>
                <td>{{ $result->transaction_code }}</td>
                <td>{{ number_format($result->amount, 2) }}</td>
                <td>{{ $result->status }}</td>
                <td>{{ $result->created_at }}</td>
            </tr>
        @empty
            <tr class="text-center">
                <td colspan="4"><small>No Information Given.</small></td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
