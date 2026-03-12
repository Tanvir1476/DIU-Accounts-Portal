<x-app-layout>

    <style>
        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 12px;
            margin-bottom: 20px;
            margin-top: 10px;
            margin-left: 220px;
        }

        .card {
            background: #2c2ebb;
            border-radius: 12px;
            overflow: hidden;
            text-align: center;
            color: #fff;
            font-weight: 600;
        }

        .card .card-header {
            padding: 14px;
            font-size: 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        }

        .card .card-body {
            padding: 18px;
            font-size: 20px;
        }

        .section {
            background: white;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            margin-left: 220px;
        }

        .section h3 {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .page-title {
            background: #f3f4f6;
            padding: 20px;
            margin-left: 220px;
            margin-top: 60px;
            width: calc(100% - 260px);
        }

        .page-title h1 {
            font-size: 24px;
            font-weight: 600;
            color: #1f2937;
        }

        .page-title p {
            font-size: 14px;
            color: #6b7280;
        }

        p {
            font-size: 25px;
            font-weight: 600;
            color: black;
        }
    </style>


    <div class="page-title">
        <h1>Dashboard</h1>
        <p>Student Portal</p>
    </div>


    <div class="dashboard-cards">

        <div class="card">
            <div class="card-header">Total Payable</div>
            <div class="card-body">{{ $totalPayable }}</div>
        </div>

        <div class="card">
            <div class="card-header">Total Paid</div>
            <div class="card-body">{{ $totalPaid }}</div>
        </div>

        <div class="card">
            <div class="card-header">Total Due</div>
            <div class="card-body">{{ $totalDue }}</div>
        </div>

        <div class="card">
            <div class="card-header">Total Other</div>
            <div class="card-body">0</div>
        </div>

    </div>


    <div class="section">
        <p>Recent Payments</p>
        <canvas id="tokenChart" height="100"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const labels = @json($tokenRequests->pluck('fee_for'));
        const data = @json($tokenRequests->pluck('total_amount'));

        const ctx = document.getElementById('tokenChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Amount',
                    data: data,
                    backgroundColor: [
                        '#4F46E5', // Purple
                        '#06B6D4', // Cyan
                        '#22C55E', // Green
                        '#F59E0B', // Orange
                        '#EF4444' // Red
                    ],
                    borderRadius: 10,
                    barThickness: 50
                }]
            },

            options: {
                responsive: true,
                plugins: {
                    legend: {
                        labels: {
                            font: {
                                family: 'Poppins',
                                size: 14,
                                weight: '600'
                            }
                        }
                    }
                },

                scales: {
                    x: {
                        ticks: {
                            font: {
                                family: 'Poppins',
                                size: 13,
                                weight: '500'
                            }
                        }
                    },
                    y: {
                        beginAtZero: true,
                        ticks: {
                            font: {
                                family: 'Poppins',
                                size: 12
                            }
                        }
                    }
                }
            }
        });
    </script>

</x-app-layout>