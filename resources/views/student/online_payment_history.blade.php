<x-app-layout>
    <h2 class="font-normal text-l text-gray-800 ">

        <style>
            .table-box {
                background: #fff;
                padding: 20px;
                border-radius: 12px;
                margin-top: 80px;
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
                font-weight: 800;
                font-size: 18px;
                border-bottom: 2px solid #eee;
            }

            td {
                padding: 10px;
                border-bottom: 1px solid #f2f2f2;
            }

            tr:hover {
                background: #f9f9f9;
            }
        </style>

        <div class="table-box">

            <table>

                <tr>
                    <th>Amount</th>
                    <th>Transaction ID</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>

                @foreach($payments as $p)

                <tr>
                    <td>{{ $p->amount }} TK</td>
                    <td>{{ $p->trx_id }}</td>
                    <td>{{ $p->status }}</td>
                    <td>{{ $p->created_at }}</td>
                </tr>

                @endforeach

            </table>

        </div>

</x-app-layout>