<div class="row">
    <div class="col-md-3 mb-4">
        <div class="card text-center shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Total e-cedula Applications ({{ Carbon\Carbon::now()->year }})</h5>
                <h2 class="card-text">{{ $this->CountnumberOfApplicants() }}<!----></h2>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card text-center shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Total Revenue from Payments ({{ Carbon\Carbon::now()->year }})</h5>
                <h2 class="card-text">₱{{ $this->TotalAmountOfTransactionByYear() }}<!----></h2>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card text-center shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Number of Active Taxpayers ({{ Carbon\Carbon::now()->year }})</h5>
                <h2 class="card-text">{{ $this->totalActiveTaxPayersThisYear() }}<!----></h2>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card text-center shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Number of Active Staff Members ({{ Carbon\Carbon::now()->year }})</h5>
                <h2 class="card-text">{{ $this->totalActiveStaffThisYear() }}<!----></h2>
            </div>
        </div>
    </div>
</div>
