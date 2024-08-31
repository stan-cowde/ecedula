<?php
require ('../config/config.php');

session_start();

include('includes/header.php');
include('includes/sidebar.php');
include('includes/navbar.php');


$currentYear = date('Y');


$totalApplicantsActiveThisYear = totalApplicantsActiveThisYear($currentYear);
$NumberOfApplicants = isset($totalApplicantsActiveThisYear) ? $totalApplicantsActiveThisYear : '0';

$totalRevenueFromPaymentsThisYear =  totalRevenueFromPaymentsThisYear($currentYear);
$totalPaidByCurrentYear = isset($totalRevenueFromPaymentsThisYear) ? $totalRevenueFromPaymentsThisYear : '0';

$totalActiveTaxPayersThisYear = totalActiveTaxPayersThisYear($currentYear);
$totalActiveTaxPayersThisYear = isset($totalActiveTaxPayersThisYear) ? $totalActiveTaxPayersThisYear : '0';

$totalActiveStaffThisYear = totalActiveStaffThisYear($currentYear);
$totalActiveStaffThisYear = isset($totalActiveStaffThisYear) ? $totalActiveStaffThisYear : '0';

$revenueData = getMonthlyRevenue($currentYear);
$revenueData = isset($revenueData) ? $revenueData : [];

$currentYear = date('Y');
$startYear = $currentYear;
$endYear = $currentYear + 5;

// Generate revenue data for each year
$revenueDataByYear = [];
for ($year = $startYear; $year <= $endYear; $year++) {
    $revenueDataByYear[$year] = getMonthlyRevenue($year);
}

?>

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <div class="card-body">
        <div class="row">
                <div class="col-md-3 mb-4">
                    <div class="card text-center shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Total e-cedula Applications (<?php echo date("Y"); ?>)</h5>
                            <h2 class="card-text"><?= $NumberOfApplicants; ?></h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card text-center shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Total Revenue from Payments (<?php echo date("Y"); ?>)</h5>
                            <h2 class="card-text">₱<?=  $totalRevenueFromPaymentsThisYear; ?></h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card text-center shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Number of Active Taxpayers (<?php echo date("Y"); ?>)</h5>
                            <h2 class="card-text"><?= $totalActiveTaxPayersThisYear; ?></h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card text-center shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Number of Active Staff Members (<?php echo date("Y"); ?>)</h5>
                            <h2 class="card-text"><?= $totalActiveStaffThisYear; ?></h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="row m-5">
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="mb-0">Annual Payment Projection</h5>
                            <select id="yearSelect" class="form-select w-auto" onchange="updateChart()">
                                <?php
                                $currentYear = date('Y');
                                for ($year = $currentYear; $year <= $currentYear + 5; $year++) {
                                    echo "<option value=\"$year\">$year</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <canvas id="projectionChart"></canvas>
                    </div>
                </div>
            </div>


   
    </div>
</div>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>

<script>

    var revenueDataByYear = <?= json_encode($revenueDataByYear); ?>;

        const ctxx = document.getElementById('projectionChart').getContext('2d');
        let projectionChart = new Chart(ctxx, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                datasets: [{
                    label: `Revenue ${<?php echo $currentYear; ?>}`,
                    data: revenueDataByYear[<?=  $currentYear; ?>],
                    borderColor: 'red',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    fill: true,
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

    function updateChart() {
        const selectedYear = document.getElementById('yearSelect').value;

        projectionChart.data.datasets[0].data = revenueDataByYear[selectedYear];
        projectionChart.data.datasets[0].label = `Revenue ${selectedYear}`;
        projectionChart.update();
    }
    </script>


