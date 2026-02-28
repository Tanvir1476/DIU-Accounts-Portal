<!DOCTYPE html>
<html>
<head>
    <title>Payment Invoice</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, sans-serif;
            background: #eef2f7;
            margin: 0;
            padding: 30px;
        }

        .invoice-container {
            max-width: 800px;
            margin: auto;
            background: #fff;
            border-radius: 12px;
            padding: 35px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            position: relative;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #0c3c78;
            padding-bottom: 20px;
        }

        .logo img {
            width: 140px;
        }

        .university-info {
            text-align: right;
        }

        .university-info h2 {
            margin: 0;
            color: #0c3c78;
        }

        .university-info p {
            margin: 3px 0;
            font-size: 14px;
            color: #555;
        }

        .invoice-title {
            margin: 25px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .invoice-title h1 {
            margin: 0;
            color: #333;
        }

        .details {
            margin: 20px 0;
        }

        .details table {
            width: 100%;
            border-collapse: collapse;
        }

        .details td {
            padding: 10px 0;
            font-size: 15px;
        }

        .details td:first-child {
            font-weight: bold;
            color: #555;
            width: 150px;
        }

        .payment-table {
            margin-top: 20px;
        }

        .payment-table table {
            width: 100%;
            border-collapse: collapse;
        }

        .payment-table th {
            background: #0c3c78;
            color: #fff;
            padding: 12px;
            text-align: left;
        }

        .payment-table td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        .total {
            text-align: right;
            margin-top: 20px;
        }

        .total h2 {
            margin: 0;
            color: #0c3c78;
        }

        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 13px;
            color: #777;
            border-top: 1px solid #ddd;
            padding-top: 15px;
        }

        .stamp {
            position: absolute;
            top: 180px;
            right: 40px;
            transform: rotate(-15deg);
            border: 3px solid blue;
            color: blue;
            padding: 15px 25px;
            text-align: center;
            border-radius: 8px;
            font-weight: bold;
            opacity: 0.85;
        }

        .stamp h2 {
            margin: 0;
            font-size: 22px;
            letter-spacing: 2px;
        }

        .stamp p {
            margin: 5px 0 0;
            font-size: 12px;
        }
    </style>
</head>
<body>

<div class="invoice-container">

    @if($data->status == 'Approved')
    <div class="stamp">
        <h2>APPROVED</h2>
        <p>Daffodil International University</p>
        <p>{{ date('d M Y') }}</p>
    </div>
    @endif

    <div class="header">
        <div class="logo">
            <img src="Images/logo_white.png" alt="DIU Logo">
        </div>
        <div class="university-info">
            <h2>Daffodil International University</h2>
            <p>Dhaka, Bangladesh</p>
            <p>Email: info@diu.edu.bd</p>
        </div>
    </div>

    <div class="invoice-title">
        <h1>INVOICE</h1>
    </div>

    <div class="details">
        <table>
            <tr>
                <td>Name</td>
                <td>{{ $data->name }}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{ $data->email }}</td>
            </tr>
            <tr>
                <td>Token No</td>
                <td>{{ $data->token_number }}</td>
            </tr>
            <tr>
                <td>Fee For</td>
                <td>{{ $data->fee_for }}</td>
            </tr>
        </table>
    </div>

    <div class="payment-table">
        <table>
            <tr>
                <th>Description</th>
                <th>Amount</th>
            </tr>
            <tr>
                <td>{{ $data->fee_for }}</td>
                <td> {{ number_format($data->amount, 2) }} Taka</td>
            </tr>
        </table>
    </div>

    <div class="total">
        <h2>Total: {{ number_format($data->amount, 2) }} taka</h2>
    </div>

    <div class="footer">
        <p>This is a system generated invoice.</p>
        <p>&copy; {{ date('Y') }} Daffodil International University</p>
    </div>

</div>

</body>
</html>