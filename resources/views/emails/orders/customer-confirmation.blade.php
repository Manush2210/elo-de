<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Confirmation de commande</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { width: 100%; max-width: 600px; margin: 0 auto; }
        .header { background-color: #c41c1c; color: white; padding: 15px; text-align: center; }
        .content { padding: 20px; }
        .footer { text-align: center; padding: 15px; font-size: 12px; color: #777; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .total-row { font-weight: bold; background-color: #f9f9f9; }
        .thank-you { font-size: 18px; font-weight: bold; margin: 20px 0; text-align: center; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Confirmation de commande</h1>
        </div>
        <div class="content">
            <p class="thank-you">Merci pour votre commande !</p>

            <p>Bonjour {{ $order->billing_first_name }},</p>

            <p>Nous avons bien reçu votre commande #{{ $order->order_number }} et elle est actuellement en cours de traitement.</p>

            <p>Voici un récapitulatif de votre commande :</p>

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
                    @foreach($order->items as $item)
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

            <h2>Adresse de livraison</h2>
            <p>
                {{ $order->shipping_first_name }} {{ $order->shipping_last_name }}<br>
                {{ $order->shipping_address }}<br>
                {{ $order->shipping_postal_code }} {{ $order->shipping_city }}<br>
                {{ $order->shipping_country }}
            </p>

            <h2>Méthode de paiement</h2>
            <p>Virement bancaire</p>

            <p>Nous vous contacterons dès que votre commande sera expédiée ou si nous avons besoin d'informations supplémentaires.</p>

            <p>Si vous avez des questions concernant votre commande, n'hésitez pas à nous contacter à l'adresse suivante : <a href="mailto:contact@voyance-seb.com">contact@voyance-seb.com</a></p>

            <p>Merci de votre confiance !</p>
        </div>
        <div class="footer">
            <p>© {{ date('Y') }} Voyance Seb - Tous droits réservés</p>
        </div>
    </div>
</body>
</html>
