<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Receipt</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
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
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            border: 2px solid #0077b6;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h2 {
            margin: 0;
            color: #0077b6;
            font-weight: 600;
        }

        .logo {
            width: 80px;
            display: block;
            margin: 0 auto 10px;
        }

        .receipt-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .receipt-table th,
        .receipt-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .receipt-table th {
            background-color: #e0f2fe;
            color: #333;
            font-weight: 600;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #555;
            font-style: italic;
        }

        .transaction-id {
            font-weight: bold;
            color: #0077b6;
        }

        .status {
            font-weight: bold;
            color: green;
        }

        .download-btn {
            display: block;
            width: 100%;
            background-color: #0077b6;
            color: white;
            padding: 10px;
            text-align: center;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container" id="receipt">
        <div class="header">
            <h2>Transaction Receipt</h2>
            <p>Payment Successfully Processed</p>
        </div>
        <table class="receipt-table">
            <tr>
                <th>Transaction ID</th>
                <td class="transaction-id">{{ $data['transaction_id'] }}</td>
            </tr>
            <tr>
                <th>Payment Index (pidx)</th>
                <td>{{ $data['pidx'] }}</td>
            </tr>
            <tr>
                <th>Amount</th>
                <td>NPR. {{ number_format($data['amount']/100, 2) }}</td>
            </tr>
            <tr>
                <th>Total Amount</th>
                <td>NPR. {{ number_format($data['total_amount']/100, 2) }}</td>
            </tr>
            <tr>
                <th>Mobile</th>
                <td>{{ $data['mobile'] }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td class="status">{{ $data['status'] }}</td>
            </tr>
            <tr>
                <th>Purchase Order ID</th>
                <td>{{ $data['purchase_order_id'] }}</td>
            </tr>
            <tr>
                <th>Purchase Order Name</th>
                <td>{{ $data['purchase_order_name'] }}</td>
            </tr>
        </table>
        <button class="download-btn" onclick="downloadPDF()">Download PDF</button>
        <div class="footer">
            <p>Thank you for your transaction.</p>
            <p><strong>Bank Name:</strong> XYZ Bank | <strong>Customer Service:</strong> 1234-567890</p>
        </div>
    </div>

    <script>
        function downloadPDF() {
            const element = document.getElementById('receipt');
            html2pdf(element);
        }
    </script>
</body>

</html>