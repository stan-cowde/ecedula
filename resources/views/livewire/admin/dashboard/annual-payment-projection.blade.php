<div class="card">
    <div class="row m-5">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">Annual Payment Projection</h5>

                <select id="yearSelect" class="form-select w-auto" onchange="updateChart()">
                    @foreach($this->DisplyAnnualPaymentProjectionChartAnalytics() as $year)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endforeach
                </select>
            </div>
            <canvas id="projectionChart"></canvas>
        </div>
    </div>



@script
<script>



    let revenueDataByYear = {!! json_encode($this->revenueDataByYear) !!};

    console.log(revenueDataByYear);

    const ctxx = document.getElementById('projectionChart').getContext('2d');
    let projectionChart = new Chart(ctxx, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            datasets: [{
                label: `Revenue ${document.getElementById('yearSelect').value}`,
                data: revenueDataByYear[document.getElementById('yearSelect').value],
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

    window.updateChart = function() {
        const selectedYear = document.getElementById('yearSelect').value;

        projectionChart.data.datasets[0].data = revenueDataByYear[selectedYear];
        projectionChart.data.datasets[0].label = `Revenue ${selectedYear}`;
        projectionChart.update();

        // console.log(projectionChart.data.datasets[0].data);
        // console.log(projectionChart.data.datasets[0].label);
    }
</script>
@endscript

</div>
