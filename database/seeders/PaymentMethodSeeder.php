<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $paymentMethods = [
            [
                'name' => 'Western Union',
                'code' => 'western_union',
                'description' => 'Service de transfert d\'argent international Western Union',
                'instructions' => 'Après avoir passé votre commande, vous recevrez les informations nécessaires pour effectuer le transfert Western Union.',
                'is_active' => true,
                'logo' => 'payment_methods/western_union.png'
            ],
            [
                'name' => 'Ria Money Transfer',
                'code' => 'ria',
                'description' => 'Service de transfert d\'argent international Ria',
                'instructions' => 'Après avoir passé votre commande, vous recevrez les informations nécessaires pour effectuer le transfert Ria.',
                'is_active' => true,
                'logo' => 'payment_methods/ria.png'
            ],
            [
                'name' => 'MoneyGram',
                'code' => 'moneygram',
                'description' => 'Service de transfert d\'argent international MoneyGram',
                'instructions' => 'Après avoir passé votre commande, vous recevrez les informations nécessaires pour effectuer le transfert MoneyGram.',
                'is_active' => true,
                'logo' => 'payment_methods/moneygram.png'
            ]
        ];

        foreach ($paymentMethods as $method) {
            PaymentMethod::updateOrCreate(
                ['code' => $method['code']],
                $method
            );
        }
    }
}
