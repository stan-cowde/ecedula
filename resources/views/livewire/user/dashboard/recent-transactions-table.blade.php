<table class="table table-striped">
    <thead>
    <tr>
        <th>Date</th>
        <th>Transaction ID</th>
        <th>Amount</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    @if(\Auth::user()->verified === 1)
        @forelse($recentTransactions as $transaction)
            <tr>
                <td>{{ $transaction['created_at'] }}</td>
                <td>{{ $transaction['transaction_code'] }}</td>
                <td>₱{{ $transaction['amount'] }}</td>
                <td>{{ $transaction['status'] }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">No transactions yet</td>
            </tr>
        @endforelse

    @else
        <tr>
            <td colspan="4" class="text-center">No transactions yet</td>
        </tr>
    @endif
    </tbody>
</table>
