<x-app-layout>
    <h2 class="font-semibold text-xl text-gray-800 ">
        <style>
            img {
                height: 30px;
                width: 150px;
            }

            body {
                background: #f5f7fa;
                font-family: Arial, Helvetica, sans-serif;
            }

            .content {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                margin-top: 10px;
                background: white;
                padding: 30px;
                border-radius: 12px;
                box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
                width: 450px;
                margin-left: 600px;
            }

            select,
            input {
                width: 400px;
                padding: 8px;
                border-radius: 6px;
                border: 1px solid #ccc;
            }

            label {
                font-weight: bold;
            }

            h1 {
                font-weight: bolder;
                font-size: 25px;
                margin-bottom: 20px;
            }

            .btn-save {
                background: #2563eb;
                margin-left: 5px;
                color: white;
                padding: 10px 25px;
                border: none;
                border-radius: 8px;
                cursor: pointer;
                transition: 0.3s;
            }

            .btn-save:hover {
                background: #1e40af;
            }

            .btn-view {
                background: #16a34a;
                margin-left: 70px;
                margin-right: 25px;
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
        </style>

        <div class="content">

            <h1>Add Semester Fee</h1>

            <form action="/admin/save" method="POST">
                @csrf

                <label for="department">Department</label>
                <select name="department" id="department">
                    <option>SWE</option>
                    <option>CSE</option>
                    <option>NFE</option>
                    <option>EEE</option>
                </select>

                <br><br>

                <label for="semester">Semester</label>
                <select name="semester" id="semester">
                    <option>Spring-26</option>
                    <option>Fall-25</option>
                </select>

                <br><br>

                <label for="fee_type">Fee Type</label>
                <select name="fee_type" id="fee_type">
                    <option>Midterm</option>
                    <option>Final</option>
                    <option>Transport</option>
                </select>

                <br><br>

                <label for="amount">Amount</label>
                <input type="number" name="amount" placeholder="Amount" id="amount" required>

                <br><br>
                <a href="/admin/list" class="btn-view">View List</a>

                <button class="btn-save">
                    Save
                </button>

            </form>
        </div>

</x-app-layout>