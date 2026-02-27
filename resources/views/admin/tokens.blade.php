<x-app-layout>
    <h2 class="font-semibold text-xl text-gray-800 ">
        <style>
            .main-content {
                margin-left: 260px;
                padding: 20px;
            }
            #heading{
                font-size: 25px;
            }

            .table-box {
                background: #fff;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
                overflow-x: auto;
                margin-top: 20px;
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

            .btn:hover {
                opacity: 0.8;
            }
        </style>


        <div class="main-content">

            <b id="heading">All Token Requests</b>

            <div class="table-box">

                <table>
                    <tr>
                        <th>Token</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Fee For</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th style="min-width:150px;">Action</th>
                    </tr>

                    @foreach($requests as $r)
                    <tr>
                        <td>{{ $r->token_number }}</td>
                        <td>{{ $r->name }}</td>
                        <td>{{ $r->email }}</td>
                        <td>{{ $r->fee_for }}</td>
                        <td>{{ $r->amount }}</td>
                        <td>
                            {{ $r->created_at->format('d M Y') }} <br>
                            <small>{{ $r->created_at->format('h:i A') }}</small>
                        </td>

                        <td>
                            @if($r->status == 'Pending')
                            <span class="status pending">Pending</span>
                            @elseif($r->status == 'Approved')
                            <span class="status approved">Approved</span>
                            @else
                            <span class="status rejected">Rejected</span>
                            @endif
                        </td>

                        <td>
                            <a href="/admin/status/{{ $r->id }}/Approved">
                                <button class="btn btn-approve">Approve</button>
                            </a>

                            <a href="/admin/status/{{ $r->id }}/Rejected">
                                <button class="btn btn-reject">Reject</button>
                            </a>
                        </td>

                    </tr>
                    @endforeach

                </table>

            </div>

        </div>

</x-app-layout>