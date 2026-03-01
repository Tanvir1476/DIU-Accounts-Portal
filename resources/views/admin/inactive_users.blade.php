<x-app-layout>
    <h2 class="font-semibold text-xl text-gray-800 "></h2>

    <style>
        .container {
            padding: 20px;
            margin-left: 240px;
            width: calc(100% - 240px);
            background: #f9fafb;
        }

        .title {
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 20px;
            color: #111827;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            background: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        th {
            background: #f3f4f6;
            color: #374151;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 13px;
        }

        th, td {
            padding: 12px 10px;
            border-bottom: 1px solid #e5e7eb;
            text-align: left;
        }

        tr:hover {
            background: #f9fafb;
            transition: 0.2s;
        }

        th:last-child,
        td:last-child {
            text-align: center;
        }

        th:nth-child(1), td:nth-child(1) { width: 20%; }
        th:nth-child(2), td:nth-child(2) { width: 30%; }
        th:nth-child(3), td:nth-child(3) { width: 15%; }
        th:nth-child(4), td:nth-child(4) { width: 15%; }

        .btn {
            padding: 6px 14px;
            border: none;
            border-radius: 6px;
            background: #16a34a;
            color: white;
            cursor: pointer;
            font-size: 14px;
            transition: 0.2s;
        }

        .btn:hover {
            background: #15803d;
        }

        .status {
            font-weight: 600;
            padding: 4px 8px;
            border-radius: 5px;
            font-size: 12px;
            text-transform: capitalize;
        }

        .inactive {
            color: #dc2626;
            background: #fee2e2;
        }

        .success {
            color: green;
            margin-bottom: 10px;
        }
    </style>

    <div class="container">

        <div class="title">Inactive Users</div>

        @if(session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Action</th>
            </tr>

            @foreach($users as $u)
            <tr>
                <td>{{ $u->name }}</td>
                <td>{{ $u->email }}</td>
                <td>
                    <span class="status inactive">{{ $u->status }}</span>
                </td>
                <td>
                    <a href="{{ route('admin.activate.user', $u->id) }}">
                        <button class="btn">Activate</button>
                    </a>
                </td>
            </tr>
            @endforeach

        </table>

    </div>

</x-app-layout>