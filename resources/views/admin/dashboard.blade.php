<x-app-layout>

    <style>
        .dashboard-container {
            margin-left: 220px;
            margin-top: 60px;
            padding: 20px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 12px;
            margin-bottom: 20px;
        }

        .card {
            background: #2c2ebb;
            border-radius: 12px;
            overflow: hidden;
            text-align: center;
            color: #fff;
            font-weight: 600;
        }

        .card-header {
            padding: 14px;
            font-size: 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        }

        .card-body {
            padding: 18px;
            font-size: 22px;
        }

        .section {
            background: white;
            padding: 18px;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
        }

        .section p {
            font-size: 25px;
            font-weight: 600;
            color: black;
            margin-bottom: 20px;
        }

        .chart-small {
            width: 350px;
            margin: auto;
        }

        p {
            font-size: 25px;
            font-weight: 600;
            color: black;
            margin-bottom: 20px;
        }
    </style>


    <div class="dashboard-container">

        <p>Admin Dashboard</p>


        <div class="cards">

            <div class="card">
                <div class="card-header">Total Students</div>
                <div class="card-body">{{ $totalStudents }}</div>
            </div>

            <div class="card">
                <div class="card-header">Active Students</div>
                <div class="card-body">{{ $activeStudents }}</div>
            </div>

            <div class="card">
                <div class="card-header">Inactive Students</div>
                <div class="card-body">{{ $inactiveStudents }}</div>
            </div>

            <div class="card">
                <div class="card-header">Total Token Requests</div>
                <div class="card-body">{{ $totalTokens }}</div>
            </div>

        </div>

        <div class="section">

            <p>Token Requests Peak Time</p>

            <canvas id="tokenTimeChart" height="120"></canvas>

        </div>


        <div class="section">

            <p>Payment Distribution</p>

            <div class="chart-small">

                <canvas id="paymentChart"></canvas>

            </div>

        </div>


    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        new Chart(document.getElementById('paymentChart'), {

            type: 'pie',

            data: {

                labels: ['Online Payment', 'Token Payment'],

                datasets: [{

                    data: [
                        {{ $onlinePayment }},
                        {{ $offlinePayment }}
                    ],

                    backgroundColor: [
                        '#22C55E',
                        '#4F46E5'
                    ]

                }]

            },

            options: {
                plugins: {
                    legend: {
                        position: 'bottom'
                    }
                }
            }

        });


        new Chart(document.getElementById('tokenTimeChart'), {

            type: 'bar',

            data: {

                labels: {!! json_encode($timeLabels) !!},

                datasets: [{

                    label: 'Token Requests',

                    data: {!! json_encode($timeTotals) !!},

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

                plugins: {
                    legend: {
                        display: false
                    }
                },

                scales: {

                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        },
                        title: {
                            display: true,
                            text: 'Token Requests'
                        }
                    },

                    x: {
                        title: {
                            display: true,
                            text: 'Time of Day'
                        }
                    }

                }

            }

        });
    </script>

</x-app-layout>
