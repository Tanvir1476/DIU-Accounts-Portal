<x-app-layout>
    <h2 class="font-normal text-l text-gray-800 ">
        <style>
            .status-box {
                display: flex;
                align-items: center;
                gap: 5px;
                flex-wrap: wrap;
            }

            .table-box {
                background: #fff;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
                margin-left: 230px;
                padding: 20px;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                min-width: 900px;
            }

            th {
                background: #f5f5f5;
                padding: 12px;
                font-size: 13px;
                text-align: left;
            }

            td {
                padding: 12px;
                border-bottom: 1px solid #ddd;
            }

            .status {
                padding: 5px 10px;
                border-radius: 20px;
                font-size: 12px;
            }

            .pending {
                background: #fff3cd;
                color: #856404;
            }

            .approved {
                background: #d4edda;
                color: #155724;
            }

            .rejected {
                background: #f8d7da;
                color: #721c24;
            }

            .current-badge {
                background: #007bff;
                color: #fff;
                padding: 4px 8px;
                border-radius: 15px;
                font-size: 11px;
                margin-left: 5px;
            }

            .btn {
                padding: 6px 10px;
                border: none;
                border-radius: 5px;
                color: white;
                cursor: pointer;
                font-size: 12px;
            }

            .btn-approve {
                background: green;
            }

            .btn-reject {
                background: red;
                margin-left: 5px;
            }

            .btn-disabled {
                background: gray !important;
                cursor: not-allowed;
            }

            .btn:hover {
                opacity: 0.8;
            }

            a {
                display: flex;
                align-items: center;
            }

            .header-bar {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 20px;
            }

            .title {
                font-size: 28px;
                font-weight: 500;
                color: black;
                margin-top: 40px;
                margin-bottom: 10px;
            }

            .clear-btn {
                background: #df1e21;
                margin-top: 30px;
                border: none;
                padding: 8px 16px;
                color: #fff;
                font-size: 13px;
                border-radius: 6px;
                cursor: pointer;
                transition: 0.3s ease;
            }

            .clear-btn:hover {
                background: #d9363e;
            }
        </style>

        <div class="table-box">
            <div class="header-bar">
                <div class="title">Token Serial List</div>
            </div>
            <table id="tokenTable">
                <tr>
                    <th>Token</th>
                    <th>Name</th>
                    <th>Fee For</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>

                @foreach($requests as $r)
                <tr>
                    <td>{{ $r->token_number }}</td>
                    <td>{{ $r->name }}</td>
                    <td>{{ $r->fee_for }}</td>
                    <td>{{ $r->amount }}</td>

                    <td>
                        {{ $r->created_at->format('d M Y') }} <br>
                        <small>{{ $r->created_at->format('h:i A') }}</small>
                    </td>


                    <td>
                        <div class="status-box">

                            @if($r->status == 'Pending')
                            <span class="status pending">Pending</span>
                            @elseif($r->status == 'Approved')
                            <span class="status approved">Approved</span>
                            @else
                            <span class="status rejected">Rejected</span>
                            @endif

                            @if($r->is_current)
                            <span class="current-badge">In Queue</span>
                            @endif

                        </div>
                    </td>

                </tr>
                @endforeach
            </table>
        </div>

</x-app-layout>