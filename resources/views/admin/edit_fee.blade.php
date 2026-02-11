<x-app-layout>
    <h2 class="font-semibold text-xl text-gray-800 ">
        <style>
            body {
                background: #f5f7fa;
                font-family: Arial, Helvetica, sans-serif;
            }

            .page-title {
                text-align: center;
                margin-top: 15px;
                margin-left: 150px;
                font-size: 35px;
                font-weight: bold;
            }

            .form-container {
                width: 90%;
                max-width: 500px;
                margin: 15px auto;
                margin-left: 55%;
                transform: translateX(-50%);
                background: white;
                padding: 30px;
                border-radius: 12px;
                box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            }

            .form-container input {
                width: 100%;
                padding: 10px;
                border-radius: 8px;
                border: 1px solid #ccc;
                margin-top: 5px;
            }

            .form-container label {
                font-weight: bold;
            }

            .btn-update {
                width: 100%;
                background: #2563eb;
                color: white;
                padding: 12px;
                border: none;
                border-radius: 8px;
                cursor: pointer;
                margin-top: 20px;
                transition: 0.3s;
            }

            .btn-update:hover {
                background: #1e40af;
            }
        </style>

        <h2 class="page-title">Edit Fee</h2>

        <div class="form-container">

            <form action="/update/{{ $data->id }}" method="POST">
                @csrf

                <label>Department</label>
                <input name="department" value="{{ $data->department }}">

                <br>

                <label>Semester</label>
                <input name="semester" value="{{ $data->semester }}">

                <br>

                <label>Fee Type</label>
                <input name="fee_type" value="{{ $data->fee_type }}">

                <br>

                <label>Amount</label>
                <input name="amount" value="{{ $data->amount }}" required>

                <button class="btn-update">Update</button>

            </form>

        </div>

</x-app-layout>