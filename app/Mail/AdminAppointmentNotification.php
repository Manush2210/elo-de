<?php

namespace App\Mail;

use App\Models\Account;
use App\Models\Appointment;
use App\Models\TimeSlot;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminAppointmentNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $appointment;
    public $timeSlot;
    public $bankAccount;

    public function __construct(Appointment $appointment, TimeSlot $timeSlot, Account $bankAccount = null)
    {
        $this->appointment = $appointment->load('consultationType');
        $this->timeSlot = $timeSlot;
        $this->bankAccount = $bankAccount ?? Account::getLastActive();
    }

    public function build()
    {
        $mail = $this->markdown('emails.admin-appointment-notification')
            ->subject('Nouvelle réservation de consultation - Voyance Spirituelle Expert');

        // Attacher la preuve de paiement seulement si elle existe
        if (!empty($this->appointment->payment_proof) && \Storage::disk('public')->exists($this->appointment->payment_proof)) {
            $mail->attachFromStorageDisk('public', $this->appointment->payment_proof);
        }

        return $mail;
    }
}
