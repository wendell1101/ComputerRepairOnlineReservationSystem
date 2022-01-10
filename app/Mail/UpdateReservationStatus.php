<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UpdateReservationStatus extends Mailable
{
    use Queueable, SerializesModels;

    private $reservation;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($reservation)
    {
        $this->reservation = $reservation;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('wendellchansuazo11@gmail.com', env('MAIL_FROM_NAME'))
            ->subject("Computer Repair : TransactionId #{$this->reservation->transaction_id} has been" .get_reservation_status($this->reservation->status))
            ->view('emails.update_reservation_status')
            ->with('reservation', $this->reservation);
    }
}
