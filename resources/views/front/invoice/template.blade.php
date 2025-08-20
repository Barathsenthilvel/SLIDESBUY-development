<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice - Order #{{ $order->order_id }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #6a42f1;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .header h1 {
            color: #6a42f1;
            margin: 0;
            font-size: 28px;
        }
        .invoice-details {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }
        .invoice-info, .order-info {
            flex: 1;
        }
        .invoice-info h3, .order-info h3 {
            color: #6a42f1;
            margin-bottom: 10px;
            font-size: 16px;
        }
        .info-row {
            margin-bottom: 5px;
        }
        .info-label {
            font-weight: bold;
            color: #666;
        }
        .info-value {
            color: #333;
        }
        .products-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        .products-table th {
            background-color: #6a42f1;
            color: white;
            padding: 12px;
            text-align: left;
        }
        .products-table td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }
        .products-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .total-section {
            text-align: right;
            margin-top: 20px;
        }
        .total-row {
            margin-bottom: 10px;
        }
        .total-label {
            font-weight: bold;
            color: #666;
            margin-right: 10px;
        }
        .total-value {
            font-weight: bold;
            color: #333;
        }
        .grand-total {
            font-size: 18px;
            color: #6a42f1;
            border-top: 2px solid #6a42f1;
            padding-top: 10px;
        }
        .footer {
            margin-top: 40px;
            text-align: center;
            color: #666;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>INVOICE</h1>
        <p>Slidesbuy - Premium Digital Products</p>
    </div>

    <div class="invoice-details">
        <div class="invoice-info">
            <h3>Invoice Details</h3>
            <div class="info-row">
                <span class="info-label">Invoice Number:</span>
                <span class="info-value">{{ $order->order_id }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Date:</span>
                <span class="info-value">{{ $order->created_at->format('M d, Y') }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Payment Method:</span>
                <span class="info-value">{{ ucfirst($order->payment_method) }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Status:</span>
                <span class="info-value">{{ ucfirst($order->order_status) }}</span>
            </div>
        </div>

        <div class="order-info">
            <h3>Order Information</h3>
            <div class="info-row">
                <span class="info-label">Order ID:</span>
                <span class="info-value">{{ $order->order_id }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Order Date:</span>
                <span class="info-value">{{ $order->created_at->format('M d, Y H:i') }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Customer ID:</span>
                <span class="info-value">{{ $order->user_id }}</span>
            </div>
        </div>
    </div>

    <table class="products-table">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Original Price</th>
                <th>Discount</th>
                <th>Final Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cart->singleorder as $item)
            <tr>
                <td>{{ $item['name'] }}</td>
                <td>₹{{ number_format($item['price'], 2) }}</td>
                <td>₹{{ number_format($item['coupon_amount'] ?? 0, 2) }}</td>
                <td>₹{{ number_format($item['price'] - ($item['coupon_amount'] ?? 0), 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="total-section">
        <div class="total-row">
            <span class="total-label">Subtotal:</span>
            <span class="total-value">₹{{ number_format($cart->totalPrice, 2) }}</span>
        </div>
        @if(isset($cart->coupon_amount) && $cart->coupon_amount > 0)
        <div class="total-row">
            <span class="total-label">Discount:</span>
            <span class="total-value">-₹{{ number_format($cart->coupon_amount, 2) }}</span>
        </div>
        @endif
        <div class="total-row grand-total">
            <span class="total-label">Total:</span>
            <span class="total-value">₹{{ number_format($order->total, 2) }}</span>
        </div>
    </div>

    <div class="footer">
        <p>Thank you for your purchase!</p>
        <p>This is a computer-generated invoice. No signature required.</p>
        <p>For any queries, please contact our support team.</p>
    </div>
</body>
</html>
