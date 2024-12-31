<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report of Collections and Deposits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .page-break{
            page-break-after: always;
        }
        @page {
            margin-top: 50px; /* Allocate space for the header */
            margin-bottom: 50px; /* Allocate space for the footer */
        }
    </style>
</head>
<body>
<div class="container">

    <div class="header text-center m-0">
        <h5>REPORT OF COLLECTIONS AND DEPOSITS</h5>
        <p>Barangay Government of Dawis</p>
        <p>{{ \Carbon\Carbon::now()->format('F j, Y') }}</p>
    </div>


    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th scope="col" colspan="4" style="width: 15%; text-align: center; font-size: 0.875rem;">General Fund</th>
        </tr>
        <tr>
            <th class="fw-bold" style="font-size: 0.875rem;">Official Receipts Ticket <br>Serial No. (From-To)</th>
            <th class="fw-bold" style="font-size: 0.875rem;">Payor</th>
            <th class="fw-bold" style="font-size: 0.875rem;">Particulars</th>
            <th class="fw-bold" style="font-size: 0.875rem;">Amount</th>
        </tr>
        </thead>
        <tbody>
        @forelse($information as $index => $data)
            <tr>
                <td>{{ $data->serial_number }}</td>
                <td>{{ $data->payor }}</td>
                <td>{{ $data->particulars }}</td>
                <td>₱{{ number_format($data->amount, 2) }}</td>
            </tr>
            @if(($index + 1) % 17 === 0)
                <tr class="page-break"></tr>
            @endif
        @empty
            <tr>
                <td colspan="4" class="text-center"><h3>No List Available</h3></td>
            </tr>
        @endforelse
        <tr>
            <td colspan="3" class="text-end fw-bold">TOTAL</td>
            <td>₱{{ number_format($totalAmount, 2) }}</td>
        </tr>
        </tbody>
    </table>

    <div class="mt-5 text-end">
        <p class="mb-0 mb-3">Prepared By:</p>
        <p class="mb-0 fw-bold">Marichu M. Doctor</p>
        <p>Barangay Treasurer</p>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
