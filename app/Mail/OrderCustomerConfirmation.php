<?php

namespace App\Mail;

use App\Models\Order;
use App\Models\Account;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderCustomerConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $bankAccount;

    /**
     * Create a new message instance.
     */
    public function __construct($order, Account $bankAccount = null)
    {
        $this->order = $order;
        $this->bankAccount = $bankAccount ?? Account::getLastActive();
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Confirmation de votre commande #' . $this->order->order_number)
            ->view('emails.orders.customer-confirmation');
    }
}
