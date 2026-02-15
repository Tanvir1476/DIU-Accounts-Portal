<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>View Semester Fee</title>

    <link rel="icon" href="{{ asset('Images/diu logo.png') }}" type="image/png">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }

        html,
        body {
            height: 100%;
        }

        body {
            background: #f5f7fa;
            display: flex;
            flex-direction: column;
        }

        /* NAVBAR */
        .navbar {
            display: flex;
            justify-content: space-around;
            align-items: center;
            gap: 30px;
            background-color: #ffffff;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12);
            height: 80px;
        }

        .navbar ul {
            list-style: none;
            display: flex;
            gap: 25px;
        }

        .navbar ul a {
            text-decoration: none;
            font-size: 15px;
            color: rgb(14, 13, 13);
            transition: 0.3s;
        }

        .navbar ul a:hover {
            color: rgb(78, 78, 231);
            text-decoration: underline;
        }

        /* CENTER WRAPPER */
        .main-wrapper {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* CONTENT BOX */
        .content {
            display: flex;
            flex-direction: column;
            align-items: center;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            width: 450px;
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
            margin-left: 160px;
            color: white;
            padding: 10px 25px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        .btn-save:hover {
            background: #1e40af;
        }

        .fee-show {
            margin-top: 20px;
            width: 400px;
            padding: 10px;
            background: green;
            border-radius: 8px;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            color: white;
        }
        .fee-notshow {
            margin-top: 20px;
            width: 400px;
            padding: 10px;
            background: red;
            border-radius: 8px;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            color: white;
        }
    </style>

</head>

<body>

    <div class="navbar">
        <img src="{{ asset('Images/logo_white.png') }}" height="40" width="158">

        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/fee/view">Semester Fee Amount</a></li>
            <li><a href="/login">Get Token</a></li>
            <li><a href="/contact">Contact Us</a></li>
        </ul>
    </div>

    <!-- CENTER CONTENT -->
    <div class="main-wrapper">

        <div class="content">

            <h1>View Semester Fee</h1>

            <form action="/fee/get" method="POST">
                @csrf

                <label>Department</label>
                <select name="department">
                    <option>Select Department</option>
                    <option>SWE</option>
                    <option>CSE</option>
                    <option>NFE</option>
                    <option>EEE</option>
                </select>

                <br><br>

                <label>Semester</label>
                <select name="semester">
                    <option>Select Semester</option>
                    <option>Spring-26</option>
                    <option>Fall-25</option>
                </select>

                <br><br>

                <label>Fee Type</label>
                <select name="fee_type">
                    <option>Select Fee Type</option>
                    <option>Midterm</option>
                    <option>Final</option>
                    <option>Transport</option>
                </select>

                <br><br>

                <button class="btn-save">Show Fee</button>

            </form>

            @if(isset($fee))
            <div class="fee-show">
                Fee Amount: {{ $fee->amount }} Taka
            </div>
            @else()
            <div class="fee-notshow">
                Fee Not Found
            </div>
            @endif

        </div>

    </div>

</body>

</html>
