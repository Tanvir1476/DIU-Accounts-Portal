<x-app-layout>

    <style>
        .page-title {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 20px;
            margin-left: 260px;
            margin-top: 80px;
        }

        .students-table {
            margin-left: 260px;
            margin-top: 10px;
            width: 70%;
            border-collapse: collapse;
            background: #ffffff;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
        }

        .students-table th {
            background: #f3f4f6;
            padding: 12px;
            text-align: left;
            font-weight: 600;
        }

        .students-table td {
            padding: 12px;
            border-top: 1px solid #e5e7eb;
        }

        .students-table tr:hover {
            background: #f9fafb;
        }

        .view-btn {
            background: #2563eb;
            color: white;
            border: none;
            padding: 7px 14px;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 5px;
        }

        .view-btn:hover {
            background: #1d4ed8;
        }

        .approve-btn {
            background: #16a34a;
            color: white;
            border: none;
            padding: 7px 14px;
            border-radius: 5px;
            cursor: pointer;
        }

        .approve-btn:hover {
            background: #15803d;
        }
    </style>


    <h2 class="page-title">All Students</h2>


    <table class="students-table">

        <tr>

            <th>User ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>

        </tr>

        @foreach ($students as $student)
            <tr>

                <td>{{ $student->id }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>

                <td>

                    <a href="/admin/student/{{ $student->id }}">
                        <button class="view-btn">View Details</button>
                    </a>

                    <form action="/admin/student/approve/{{ $student->id }}" method="POST" style="display:inline">

                        @csrf

                        <button type="submit" class="approve-btn">Approve</button>

                    </form>

                </td>

            </tr>
        @endforeach

    </table>


</x-app-layout>
