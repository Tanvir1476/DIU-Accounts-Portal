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
            margin-bottom: 20px;
        }

        .announcement-title {
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 18px;
            color: #2c3e50;
            font-family: 'Poppins', sans-serif;
        }

        .announcement-card {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 16px 18px;
            margin-bottom: 12px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04);
            transition: all .15s ease;
        }

        .announcement-card:hover {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
        }

        .announcement-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 6px;
        }

        .announcement-heading {
            font-size: 17px;
            font-weight: 600;
            color: #1f2937;
        }

        .announcement-message {
            font-size: 14px;
            color: #4b5563;
            line-height: 1.6;
        }

        .announcement-date {
            font-size: 12px;
            color: #9ca3af;
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

    <div class="section">
        <p>Latest Announcements</p>
        @foreach ($announcements as $a)
            <div class="announcement-card">
                <div class="announcement-header"> <span class="announcement-heading">{{ $a->title }}</span> <span
                        class="announcement-date"> {{ $a->created_at->format('d M Y') }} </span> </div>
                <div class="announcement-message"> {{ $a->message }} </div>
            </div>
        @endforeach
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
