<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Nouvelle commande</title>
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
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
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
            <h1>Nouvelle commande #{{ $order->order_number }}</h1>
        </div>
        <div class="content">
            <p>Une nouvelle commande a été passée. Voici les détails :</p>

            <h2>Informations client</h2>
            <p>
                <strong>Nom :</strong> {{ $order->billing_first_name }} {{ $order->billing_last_name }}<br>
                <strong>Email :</strong> {{ $order->billing_email }}<br>
                <strong>Téléphone :</strong> {{ $order->billing_phone }}<br>
                <strong>Type client :</strong> {{ $order->user->client_type ?? 'Non spécifié' }}
            </p>

            <h2>Adresse de facturation</h2>
            <p>
                {{ $order->billing_address }}<br>
                {{ $order->billing_postal_code }} {{ $order->billing_city }}<br>
                {{ $order->billing_country }}
            </p>

            @if (!$order->billing_same_as_shipping)
                <h2>Adresse de livraison</h2>
                <p>
                    {{ $order->shipping_first_name }} {{ $order->shipping_last_name }}<br>
                    {{ $order->shipping_address }}<br>
                    {{ $order->shipping_postal_code }} {{ $order->shipping_city }}<br>
                    {{ $order->shipping_country }}
                </p>
            @endif

            <h2>Détails de la commande</h2>
            <table>
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Prix unitaire</th>
                        <th>Quantité</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->items as $item)
                        <tr>
                            <td>{{ $item->product_name }}</td>
                            <td>{{ number_format($item->price, 2, ',', ' ') }}€</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ number_format($item->price * $item->quantity, 2, ',', ' ') }}€</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="3">Sous-total</td>
                        <td>{{ number_format($order->subtotal, 2, ',', ' ') }}€</td>
                    </tr>
                    <tr>
                        <td colspan="3">Frais de livraison</td>
                        <td>{{ number_format($order->shipping, 2, ',', ' ') }}€</td>
                    </tr>
                    <tr class="total-row">
                        <td colspan="3">Total</td>
                        <td>{{ number_format($order->total, 2, ',', ' ') }}€</td>
                    </tr>
                </tbody>
            </table>

            <h2>Informations de paiement</h2>
            <p>
                <strong>Méthode :</strong> Virement bancaire<br>
                <strong>Statut :</strong> {{ $order->status == 'pending' ? 'En attente' : $order->status }}<br>
                <strong>Preuve de paiement :</strong>
                @if ($order->payment_proof)
                    <a href="{{ asset('storage/' . $order->payment_proof) }}">Voir le justificatif</a>
                @else
                    Non fournie
                @endif
            </p>

            @if ($bankAccount)
                <div class="bank-details">
                    <h4>Coordonnées bancaires utilisées</h4>
                    <p><strong>Banque:</strong> {{ $bankAccount->bank }}</p>
                    <p><strong>Bénéficiaire:</strong> {{ $bankAccount->owner }}</p>
                    <p><strong>IBAN:</strong> {{ $bankAccount->iban }}</p>
                    <p><strong>BIC/SWIFT:</strong> {{ $bankAccount->swift }}</p>
                    <p><strong>Adresse:</strong> {{ $bankAccount->address }}</p>
                    <p><strong>Pays:</strong> {{ $bankAccount->country }}</p>
                </div>
            @endif

            @if ($order->notes)
                <h2>Notes du client</h2>
                <p>{{ $order->notes }}</p>
            @endif

            <p>Vous pouvez gérer cette commande depuis le panel d'administration.</p>
        </div>
        <div class="footer">
            <p>© {{ date('Y') }} Voyance Seb - Tous droits réservés</p>
        </div>
    </div>
</body>

</html>
