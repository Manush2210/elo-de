<?php

namespace Database\Seeders;

use App\Models\ConsultationType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConsultationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'name' => 'Consultation simple',
                'description' => 'Consultation de voyance de 30 minutes - Conseils et réponses à vos questions essentielles.',
                'price' => 40.00,
                'sort_order' => 1,
            ],
            [
                'name' => 'Consultation générale',
                'description' => 'Consultation de voyance complète de 45 minutes - Analyse détaillée de votre situation actuelle.',
                'price' => 55.00,
                'sort_order' => 2,
            ],
            [
                'name' => 'Consultation sentimentale',
                'description' => 'Consultation spécialisée dans les questions amoureuses et sentimentales.',
                'price' => 75.00,
                'sort_order' => 3,
            ]
        ];

        foreach ($types as $type) {
            ConsultationType::create($type);
        }
    }
}
