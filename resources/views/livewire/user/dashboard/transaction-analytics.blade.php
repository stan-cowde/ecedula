<div class="row">
    <div class="col-md-3">
        <div class="dashboard-card">
            <div class="card-title">Total Amount Paid (All Years)</div>
            <div class="card-value">₱{{ number_format($totalPaid, 2) }}</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="dashboard-card">
            <div class="card-title">Total Amount Paid (This Year)</div>
            <div class="card-value">₱{{ number_format($PaidByCurrentYear, 2) }}</div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="dashboard-card">
            <div class="card-title">Average Transaction Ratio</div>
            <div class="card-value">% {{ number_format($averagePercentage, 2) }}</div>
        </div>
    </div>
</div>
