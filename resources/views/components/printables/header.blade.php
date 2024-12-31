{{--<div class="container-fluid">--}}
{{--    <div class="row pdf-header align-items-center">--}}
{{--        <!-- Left Logo -->--}}
{{--        --}}{{--        <div class="col-2 text-center">--}}
{{--        --}}{{--            <img src="" alt="City Logo" class="logo">--}}
{{--        --}}{{--        </div>--}}
{{--        <!-- Centered Text -->--}}
{{--        <div class="col-8 text-center-middle">--}}
{{--            <h5 class="mb-0">Report of Collections and Deposits</h5>--}}
{{--            <p class="mb-0">Barangay Government of Dawis</p>--}}
{{--            <p class="mb-0">{{ now() }}</p>--}}
{{--        </div>--}}
{{--        <!-- Right Logo -->--}}
{{--        --}}{{--        <div class="col-2 text-center">--}}
{{--        --}}{{--            <img src="barangay_logo.png" alt="Barangay Logo" class="logo">--}}
{{--        --}}{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<?php

#Some PHP logic
use Carbon\Carbon;

$date = Carbon::now();

$formattedDate = Carbon::now()->format('F j, Y');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Header</title>
    <style>
        body {
            font-size: 12px;
            margin: 0;
        }
        .header {
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            padding: 10px 0;
            margin-top: 5rem;
            justify-content: center;
        }
    </style>
</head>
<body>
<div class="header" style="margin-bottom: 20px;">
    <h5>REPORT OF COLLECTIONS AND DEPOSITS</h5>
    <p>Barangay Government of Dawis</p>
    <p>{{ \Carbon\Carbon::now()->format('F j, Y') }}</p>
</div>
</body>
</html>
