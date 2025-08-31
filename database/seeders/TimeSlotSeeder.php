<?php

namespace Database\Seeders;

use App\Models\TimeSlot;
use Illuminate\Database\Seeder;

class TimeSlotSeeder extends Seeder
{
    public function run()
    {
        // Supprimer les anciens créneaux
        TimeSlot::truncate();

    // Jours de la semaine ISO : 1 = Lundi, 7 = Dimanche
    $daysOfWeek = [1, 2, 3, 4, 5, 6, 7]; // Lundi à Dimanche

        // Créneaux horaires
        $timeSlots = [
            ['09:00:00', '10:00:00'],
            ['10:00:00', '11:00:00'],
            ['11:00:00', '12:00:00'],
            ['14:00:00', '15:00:00'],
            ['15:00:00', '16:00:00'],
            ['16:00:00', '17:00:00'],
        ];

        foreach ($daysOfWeek as $day) {
            foreach ($timeSlots as $slot) {
                TimeSlot::updateOrCreate([
                    'day_of_week' => $day,
                    'start_time' => $slot[0],
                    'end_time' => $slot[1],
                    'is_available' => true,
                ]);
            }
        }
    }
}
