<?php

namespace App\Http\Livewire;

use App\Reservation;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use App\Mail\UpdateReservationStatus;

class AdminReservationUpdateComponent extends Component
{
    public $reservationId = null;
    public $status = 0;

    public function mount($reservation_id)
    {
        $this->reservationId = $reservation_id;
    }

    public function updateReservation()
    {
        try{
            $reservation = Reservation::with('user')->where('id', $this->reservationId)->first();
            // dd($reservation);
            Reservation::where('id', $this->reservationId)->update(['status' => $this->status]);
            //send email here
            Mail::to('wendellchansuazo11@gmail.com')->send(new UpdateReservationStatus($reservation));

            return 'A message has been sent to Mailtrap!';
        }catch(\Throwable $th){
            dd($th);
        }
    }

    public function render()
    {
        $reservation = Reservation::where('id', $this->reservationId)->first();
        return view('livewire.admin-reservation-update-component', compact('reservation'));
    }
}
