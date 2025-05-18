<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_name',
        'client_email',
        'client_phone',
        'appointment_date',
        'start_time',
        'end_time',
        'payed_amount',
        'payment_proof',
        'payment_method',
        'status',
        'notes',
        'contact_method',
        'consultation_type_id'
    ];

    protected $casts = [
        'appointment_date' => 'date',
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    /**
     * Le type de consultation associé à ce rendez-vous
     */
    public function consultationType()
    {
        return $this->belongsTo(ConsultationType::class);
    }
}
