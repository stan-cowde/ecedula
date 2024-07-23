<?php
require_once('../config/config.php');

session_start();

include('includes/header.php');
include('includes/navbar.php');

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
                            <h5 class="card-title">Total e-cedula Applications</h5>
                            <h2 class="card-text">1,234</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card text-center shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Total Revenue from Payments</h5>
                            <h2 class="card-text">₱ 12,345</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card text-center shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Number of Active Users</h5>
                            <h2 class="card-text">567</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card text-center shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Number of Active Staff Members</h5>
                            <h2 class="card-text">89</h2>
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
                                <script>
                                    const currentYear = new Date().getFullYear();
                                    for (let i = 0; i <= 5; i++) {
                                        document.write(`<option value="${currentYear + i}">${currentYear + i}</option>`);
                                    }
                                </script>
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
        const ctxx = document.getElementById('projectionChart').getContext('2d');
        let projectionChart = new Chart(ctxx, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                datasets: [{
                    label: 'Revenue',
                    data: [1200, 1900, 3000, 5000, 2300, 3200, 4000, 3900, 4500, 4800, 5200, 6000],
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
            // Here you would fetch the data for the selected year and update the chart.
            // For demonstration purposes, we are just updating the label.
            projectionChart.data.datasets[0].label = `Revenue ${selectedYear}`;
            projectionChart.update();
        }
    </script>


