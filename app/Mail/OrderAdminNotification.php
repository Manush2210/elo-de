<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderAdminNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    /**
     * Create a new message instance.
     */
    public function __construct( $order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Nouvelle commande #' . $this->order->order_number)
                    ->view('emails.orders.admin-notification');
    }
}
