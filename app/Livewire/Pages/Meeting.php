<?php

namespace App\Livewire\Pages;

use Carbon\Carbon;
use App\Models\Account;
use Livewire\Component;
use App\Models\TimeSlot;
use App\Models\Appointment;
use Livewire\WithFileUploads;
use Livewire\Attributes\Computed;
use App\Models\ConsultationType;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Mail\AppointmentConfirmation;
use App\Mail\AdminAppointmentNotification;

class Meeting extends Component
{
    use WithFileUploads;

    // --- State Management ---
    public int $currentStep = 1;

    // --- Data Properties ---
    public $consultationTypes;
    public $account = null;
    public $calendarDays = [];
    public $bookedDates = [];
    public $availableTimeSlots = [];

    // --- User Selections ---
    public $selectedConsultationType = null;
    public $selectedDate = null;
    public $selectedTimeSlot = null;

    // --- Form Inputs ---
    public $clientName = '';
    public $clientEmail = '';
    public $clientPhone = '';
    public $contactMethod = '';
    public $paymentProof;
    public $notes = '';
    public $turnstileToken;

    // --- Calendar State ---
    public $currentMonth;
    public $currentYear;

    public function mount()
    {
        $now = Carbon::now();
        $this->currentMonth = $now->month;
        $this->currentYear = $now->year;

        $this->consultationTypes = ConsultationType::active()->get();
        $this->account = Account::where('is_active', true)->latest()->first();
        $this->generateCalendar();

        $this->loadBookedDates();
    }

    // =================================================================
    // STEP NAVIGATION
    // =================================================================

    public function goToStep(int $step)
    {
        // On ne peut pas sauter des étapes en avant
        if ($step > $this->currentStep && !$this->canProceedToStep($step)) {
            return;
        }
        $this->currentStep = $step;
    }

    public function nextStep()
    {
        if ($this->canProceedToStep($this->currentStep + 1)) {
            $this->currentStep++;
        }
    }

    protected function canProceedToStep(int $targetStep): bool
    {
        return match ($targetStep) {
            2 => !empty($this->selectedConsultationType),
            3 => !empty($this->selectedDate) && !empty($this->selectedTimeSlot),
            default => true,
        };
    }

    // =================================================================
    // COMPUTED PROPERTIES (for clean UI)
    // =================================================================

    #[Computed]
    public function selectedConsultationDetails()
    {
        if (!$this->selectedConsultationType) {
            return null;
        }
        return ConsultationType::find($this->selectedConsultationType);
    }

    #[Computed]
    public function selectedSlotDetails()
    {
        if (!$this->selectedTimeSlot) {
            return null;
        }
        return TimeSlot::find($this->selectedTimeSlot);
    }

    // =================================================================
    // ACTIONS & LOGIC
    // =================================================================

    public function selectConsultationType($typeId)
    {
        $this->selectedConsultationType = $typeId;
        $this->nextStep();
    }

    public function selectDate($date)
    {
        if (!$date) return;
        $this->selectedDate = $date;
        $this->selectedTimeSlot = null; // Réinitialiser le créneau si la date change
        $this->loadAvailableTimeSlots();
    }

    public function selectTimeSlot($slotId)
    {
        $this->selectedTimeSlot = $slotId;
        $this->nextStep();
    }

    public function bookAppointment()
    {
        // Validation finale
        $validated = $this->validate([
            'clientName' => 'required|min:3',
            'clientEmail' => 'required|email',
            'clientPhone' => 'required',
            'contactMethod' => 'required|in:email,whatsapp,telephone',
            'paymentProof' => 'nullable|file|max:10240', // 10MB - optional now
            'turnstileToken' => 'required',
        ]);

        if (!$this->verifyTurnstile()) {
            session()->flash('error', 'La vérification de sécurité a échoué. Veuillez réessayer.');
            return;
        }

        // Logique de réservation existante...
        $slot = $this->selectedSlotDetails();
        // Stocker la preuve de paiement uniquement si fournie
        $paymentProofPath = null;
        if ($this->paymentProof) {
            $paymentProofPath = $this->paymentProof->store('payment_proofs', 'public');
        }

        $appointment = Appointment::create([
            'client_name' => $this->clientName,
            'client_email' => $this->clientEmail,
            'client_phone' => $this->clientPhone,
            'appointment_date' => $this->selectedDate,
            'start_time' => Carbon::parse($this->selectedDate . ' ' . $slot->start_time),
            'end_time' => Carbon::parse($this->selectedDate . ' ' . $slot->end_time),
            'notes' => $this->notes,
            'payment_proof' => $paymentProofPath,
            'payment_method' => 'virement_bancaire',
            'status' => 'booked',
            'contact_method' => $this->contactMethod,
            'consultation_type_id' => $this->selectedConsultationType,
        ]);

        // Envoi des emails...
        Mail::to($this->clientEmail)->send(new AppointmentConfirmation($appointment, $slot, $this->account));
        Mail::to(['contact@voyance-spirituelle-expert.com', 'emmanueladenidji@gmail.com'])->send(new AdminAppointmentNotification($appointment, $slot, $this->account));

        // Afficher une page de succès
        session()->flash('success_message', 'Votre rendez-vous a été confirmé !');
        $this->currentStep = 4; // Aller à l'étape de confirmation
    }


    // --- Fonctions utilitaires du calendrier (inchangées) ---

      public function generateCalendar()
    {
        $this->calendarDays = [];
        $date = Carbon::createFromDate($this->currentYear, $this->currentMonth, 1);
        $daysInMonth = $date->daysInMonth;

    // Ajouter des jours vides pour aligner correctement le premier jour du mois
    // Utiliser isoWeekday pour démarrer la grille sur Lundi = 1
    $firstDayIso = $date->isoWeekday();
    for ($i = 1; $i < $firstDayIso; $i++) {
            $this->calendarDays[] = [
                'day' => null,
                'date' => null,
                'isCurrentMonth' => false,
                'isToday' => false,
                'isPast' => true,
                'isBooked' => false,
            ];
        }

        // Ajouter les jours du mois
        $today = Carbon::today();
        for ($day = 1; $day <= $daysInMonth; $day++) {
            $currentDate = Carbon::createFromDate($this->currentYear, $this->currentMonth, $day);
            $this->calendarDays[] = [
                'day' => $day,
                'date' => $currentDate->format('Y-m-d'),
                'isCurrentMonth' => true,
                'isToday' => $currentDate->isSameDay($today),
                'isPast' => $currentDate->isPast(),
                'isBooked' => in_array($currentDate->format('Y-m-d'), $this->bookedDates),
            ];
        }
    }

    public function loadAvailableTimeSlots()
    {
        if (!$this->selectedDate) return;
    $selectedCarbDate = Carbon::parse($this->selectedDate);
    // Utiliser isoWeekday: 1 (lundi) .. 7 (dimanche) pour correspondre au seeder
    $dayOfWeek = $selectedCarbDate->isoWeekday();
    $timeSlots = TimeSlot::where('day_of_week', $dayOfWeek)->where('is_available', true)->get();
        $bookedAppointments = Appointment::where('appointment_date', $this->selectedDate)->get();
        $this->availableTimeSlots = $timeSlots->filter(function ($slot) use ($bookedAppointments) {
            foreach ($bookedAppointments as $appointment) {
                $slotStart = Carbon::parse($this->selectedDate . ' ' . $slot->start_time);
                $slotEnd = Carbon::parse($this->selectedDate . ' ' . $slot->end_time);
                $appointmentStart = Carbon::parse($appointment->start_time);
                $appointmentEnd = Carbon::parse($appointment->end_time);
                if ($slotStart < $appointmentEnd && $slotEnd > $appointmentStart) {
                    return false;
                }
            }
            return true;
        })->toArray();
    }

      public function loadBookedDates()
    {
        $startDate = Carbon::createFromDate($this->currentYear, $this->currentMonth, 1);
        $endDate = Carbon::createFromDate($this->currentYear, $this->currentMonth, $startDate->daysInMonth);

        $this->bookedDates = [];

        // Parcourir chaque jour du mois
        $currentDate = clone $startDate;
        while ($currentDate <= $endDate) {
            // Utiliser isoWeekday pour obtenir 1..7
            $dayOfWeek = $currentDate->isoWeekday();

            // Obtenir tous les créneaux disponibles pour ce jour de semaine
            $allTimeSlots = TimeSlot::where('day_of_week', $dayOfWeek)
                ->where('is_available', true)
                ->get();

            if ($allTimeSlots->isEmpty()) {
                // Si aucun créneau n'est configuré pour ce jour de semaine
                $this->bookedDates[] = $currentDate->format('Y-m-d');
            } else {
                // Vérifier les rendez-vous existants pour cette date
                $bookedSlots = Appointment::where('appointment_date', $currentDate->format('Y-m-d'))
                    ->get(['start_time', 'end_time']);

                // Compter les créneaux encore disponibles
                $availableSlots = $allTimeSlots->filter(function ($slot) use ($bookedSlots, $currentDate) {
                    // construire intervalles pour le créneau (date courante + time)
                    $slotStart = Carbon::parse($currentDate->format('Y-m-d') . ' ' . $slot->start_time);
                    $slotEnd = Carbon::parse($currentDate->format('Y-m-d') . ' ' . $slot->end_time);

                    foreach ($bookedSlots as $bookedSlot) {
                        $bookedStart = Carbon::parse($bookedSlot->start_time);
                        $bookedEnd = Carbon::parse($bookedSlot->end_time);

                        // conflit si les intervalles se chevauchent
                        if ($slotStart < $bookedEnd && $slotEnd > $bookedStart) {
                            return false;
                        }
                    }
                    return true;
                });

                // Si tous les créneaux sont réservés, marquer cette date comme réservée
                if ($availableSlots->isEmpty()) {
                    $this->bookedDates[] = $currentDate->format('Y-m-d');
                }
            }

            $currentDate->addDay();
        }

        $this->generateCalendar();
    }

    public function nextMonth()
    {
        $date = Carbon::createFromDate($this->currentYear, $this->currentMonth, 1)->addMonth();
        $this->currentMonth = $date->month;
        $this->currentYear = $date->year;
        $this->loadBookedDates();
    }

    public function prevMonth()
    {
        $date = Carbon::createFromDate($this->currentYear, $this->currentMonth, 1)->subMonth();
        $this->currentMonth = $date->month;
        $this->currentYear = $date->year;
        $this->loadBookedDates();
    }
  protected function verifyTurnstile()
    {
        $response = Http::asForm()->post('https://challenges.cloudflare.com/turnstile/v0/siteverify', [
            'secret' => config('services.cloudflare.secret_key'),
            'response' => $this->turnstileToken,
            'remoteip' => request()->ip(),
        ]);

        $result = $response->json();
        // dd($result);

        return $result['success'] ?? false;
    }

    public function render()
    {
        return view('livewire.pages.meeting');
    }
}
