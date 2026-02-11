<x-app-layout>
    <h2 class="font-semibold text-xl text-gray-800 ">

        <style>
            body {
                background: #f5f7fa;
                font-family: Arial, Helvetica, sans-serif;
            }

            .header-area {
                width: 100%;
                max-width: 700px;
                margin: 40px auto 20px 450px;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .header-area h2 {
                font-size: 28px;
                font-weight: bold;
                margin: 0;
            }

            .btn-view {
                background: #16a34a;
                color: white;
                padding: 10px 25px;
                border-radius: 8px;
                cursor: pointer;
                text-decoration: none;
                transition: 0.3s;
            }

            .btn-view:hover {
                background: #166534;
            }


            .table-container {
                width: 90%;
                max-width: 700px;
                margin: 0 auto 40px 450px;
                background: white;
                padding: 25px;
                border-radius: 12px;
                box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }

            th {
                background: #2563eb;
                color: white;
                padding: 12px;
                text-align: left;
            }

            td {
                padding: 12px;
                border-bottom: 1px solid #eee;
            }

            tr:hover {
                background: #f1f5f9;
            }

            .action-edit {
                background: #16a34a;
                color: white;
                padding: 6px 12px;
                border-radius: 6px;
                text-decoration: none;
                margin-right: 5px;
            }

            .action-delete {
                background: #dc2626;
                color: white;
                padding: 6px 12px;
                border-radius: 6px;
                text-decoration: none;
            }

            .action-edit:hover {
                background: #166534;
            }

            .action-delete:hover {
                background: #991b1b;
            }
        </style>


        <div class="header-area">
            <h2>Fee List</h2>
            <a href="/add" class="btn-view">Back</a>
        </div>


        <div class="table-container">

            <table>

                <tr>
                    <th>Dept</th>
                    <th>Semester</th>
                    <th>Type</th>
                    <th>Amount</th>
                    <th>Action</th>
                </tr>

                @foreach($data as $d)

                <tr>
                    <td>{{ $d->department }}</td>
                    <td>{{ $d->semester }}</td>
                    <td>{{ $d->fee_type }}</td>
                    <td>{{ $d->amount }}</td>

                    <td>
                        <a class="action-edit" href="/edit/{{ $d->id }}">Edit</a>
                        <a class="action-delete" href="/delete/{{ $d->id }}">Delete</a>
                    </td>

                </tr>

                @endforeach

            </table>

        </div>

</x-app-layout>