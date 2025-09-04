<?php

namespace App\Mail;

use App\Models\Account;
use App\Models\Appointment;
use App\Models\TimeSlot;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AppointmentConfirmation extends Mailable
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
        return $this->view('emails.appointment-confirmation-html')
            ->text('emails.text.appointment-confirmation')
            ->subject('Confirmation de votre rendez-vous - Voyance Spirituelle Expert');
    }
}
