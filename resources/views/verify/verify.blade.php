<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .receipt-table {
            width: 100%;
            border-collapse: collapse;
        }

        .receipt-table th,
        .receipt-table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .receipt-table th {
            background-color: #f8f8f8;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Payment Successful</h2>
        <table class="receipt-table">
            <tr>
                <th>Parameter</th>
                <th>Value</th>
            </tr>
            <tr>
                <td>Transaction ID</td>
                <td>{{ $data['transaction_id'] }}</td>
            </tr>
            <tr>
                <td>Payment Index (pidx)</td>
                <td>{{ $data['pidx'] }}</td>
            </tr>
            <tr>
                <td>Amount</td>
                <td>{{ $data['amount'] }}</td>
            </tr>
            <tr>
                <td>Total Amount</td>
                <td>{{ $data['total_amount'] }}</td>
            </tr>
            <tr>
                <td>Mobile</td>
                <td>{{ $data['mobile'] }}</td>
            </tr>
            <tr>
                <td>Status</td>
                <td>{{ $data['status'] }}</td>
            </tr>
            <tr>
                <td>Purchase Order ID</td>
                <td>{{ $data['purchase_order_id'] }}</td>
            </tr>
            <tr>
                <td>Purchase Order Name</td>
                <td>{{ $data['purchase_order_name'] }}</td>
            </tr>
        </table>
    </div>

</body>

</html>