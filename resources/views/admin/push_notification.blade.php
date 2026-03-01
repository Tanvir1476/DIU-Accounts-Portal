<x-app-layout>
    <h2 class="font-semibold text-xl text-gray-800 "></h2>

    <style>
        .container {
            padding: 20px;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 75%;
            border-collapse: collapse;
            margin-top: 20px;
            margin-left: 260px;
            background: white;
        }

        th,
        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #f5f5f5;
        }

        p {
            font-size: 25px;
            margin-left: 260px;
            font-weight: bolder;
        }

        .btn {
            padding: 6px 12px;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
        }

        .notify {
            background: #28a745;
        }

        .sent {
            background: gray;
            cursor: not-allowed;
        }
    </style>

    <div class="container">

        <p>Push Notification Panel</p>

        @if(session('success'))
        <p style="color:green;">{{ session('success') }}</p>
        @endif

        @if(session('error'))
        <p style="color:red;">{{ session('error') }}</p>
        @endif

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Token</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($requests as $r)
                    <tr>
                        <td>{{ $r->token_number }}</td>
                        <td>{{ $r->name }}</td>
                        <td>{{ $r->email }}</td>
                        <td>{{ $r->status }}</td>

                        <td>
                            @if($r->status == 'Pending')

                            @if(!$r->notified)
                            <a href="{{ route('admin.send.single', $r->id) }}">
                                <button class="btn notify">Notify</button>
                            </a>
                            @else
                            <button class="btn sent">Sent</button>
                            @endif

                            @else
                            <button class="btn disabled">Disabled</button>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

    </div>

</x-app-layout>