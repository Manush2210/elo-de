<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Bestellbestätigung</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
        }

        .header {
            background-color: #c41c1c;
            color: white;
            padding: 15px;
            text-align: center;
        }

        .content {
            padding: 20px;
        }

        .footer {
            text-align: center;
            padding: 15px;
            font-size: 12px;
            color: #777;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .total-row {
            font-weight: bold;
            background-color: #f9f9f9;
        }

        .bank-details {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Bestellbestätigung</h1>
        </div>
        <div class="content">
            <p>Hallo {{ $order->billing_first_name }},</p>

            <p>Wir haben Ihre Bestellung #{{ $order->order_number }} erhalten.</p>

            <table>
                <tbody>
                    @foreach ($order->items as $item)
                        <tr>
                            <td>{{ $item->product_name }}</td>
                            <td>{{ number_format($item->price * $item->quantity, 2, ',', ' ') }}€</td>
                        </tr>
                    @endforeach
                    <tr class="total-row">
                        <td>Gesamt</td>
                        <td>{{ number_format($order->total, 2, ',', ' ') }}€</td>
                    </tr>
                </tbody>
            </table>

            <h3>Zahlungsdetails</h3>
            <p>Zahlungsart: Banküberweisung</p>

            @if ($bankAccount)
                <div class="bank-details">
                    <h4>Bankdaten</h4>
                    <p><strong>Bank:</strong> {{ $bankAccount->bank }}</p>
                    <p><strong>Empfänger:</strong> {{ $bankAccount->owner }}</p>
                    <p><strong>IBAN:</strong> {{ $bankAccount->iban }}</p>
                    <p><strong>BIC/SWIFT:</strong> {{ $bankAccount->swift }}</p>
                    <p><strong>Adresse:</strong> {{ $bankAccount->address }}</p>
                    <p><strong>Land:</strong> {{ $bankAccount->country }}</p>
                </div>
            @endif

            <p>Bei Fragen: <a
                    href="mailto:contact@sanni-sterne.com">contact@sanni-sterne.com</a></p>

            <p>Vielen Dank für Ihr Vertrauen!</p>
        </div>
        <div class="footer">
            <p>© {{ date('Y') }} Voyance Seb</p>
        </div>
    </div>
</body>

</html>
