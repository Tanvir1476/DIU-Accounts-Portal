<x-app-layout>
    <h2 class="font-semibold text-xl text-gray-800 ">
        <style>
            .table-box {
                background: #fff;
                padding: 20px;
                border-radius: 12px;
                margin-top: 30px;
                margin-left: 260px;
                width: calc(100% - 300px);
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }

            th {
                text-align: left;
                padding: 10px;
                font-weight: 600;
                border-bottom: 2px solid #eee;
            }

            td {
                padding: 8px;
                border-bottom: 1px solid #f2f2f2;
            }

            tr:hover {
                background: #f9f9f9;
            }

            .status {
                padding: 4px 10px;
                border-radius: 20px;
                font-size: 12px;
                display: inline-block;
            }

            .approved {
                background: #d4edda;
                color: #155724;
            }

            .rejected {
                background: #f8d7da;
                color: #721c24;
            }

            .btn {
                padding: 6px 12px;
                border-radius: 6px;
                color: white;
                font-size: 12px;
                text-decoration: none;
                display: inline-block;
            }

            .btn-download {
                background: #007bff;
            }

            .btn-disabled {
                background: gray;
            }

            .filter-box {
                margin-left: 260px;
                margin-bottom: 15px;
                margin-top: 20px;
                display: flex;
                gap: 10px;
                align-items: center;
            }

            .filter-box input,
            .filter-box select {
                padding: 8px 10px;
                border: 1px solid #ccc;
                border-radius: 6px;
                outline: none;
                background: #fff;
                pointer-events: auto;
            }

            .filter-box input:focus,
            .filter-box select:focus {
                border-color: #007bff;
            }

            .filter-box button {
                padding: 8px 15px;
                border: none;
                background: #007bff;
                color: #fff;
                border-radius: 6px;
                cursor: pointer;
            }

            .filter-box button:hover {
                background: #0056b3;
            }
        </style>

        <form method="GET" action="{{ route('payment.history') }}" class="filter-box">

            <input type="text" name="search" placeholder="Search..."
                value="{{ request('search') }}">

            <select name="filter">
                <option value="">All</option>
                <option value="month" {{ request('filter')=='month' ? 'selected' : '' }}>This Month</option>
                <option value="year" {{ request('filter')=='year' ? 'selected' : '' }}>This Year</option>
            </select>

            <button type="submit">Filter</button>

        </form>
        <div class="table-box">
            <table>

                <tr>
                    <th>Token</th>
                    <th>Fee For</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>

                @foreach($requests as $r)
                <tr>
                    <td>{{ $r->token_number }}</td>
                    <td>{{ $r->fee_for }}</td>
                    <td>{{ $r->amount }}</td>
                    <td>{{ $r->created_at->format('d M Y, h:i A')}}</td>

                    <td>
                        @if($r->status == 'Approved')
                        <span class="status approved">Approved</span>
                        @else
                        <span class="status rejected">Rejected</span>
                        @endif
                    </td>

                    <td>
                        @if($r->status == 'Approved')
                        <a href="{{ route('invoice.download', $r->id) }}" class="btn btn-download">
                            Download PDF
                        </a>
                        @else
                        <span class="btn btn-disabled">Not Available</span>
                        @endif
                    </td>

                </tr>
                @endforeach

            </table>
        </div>

</x-app-layout>