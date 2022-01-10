<?php

namespace App\Http\Livewire;

use App\Reservation;
use Livewire\Component;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Mail;
use App\Mail\UpdateReservationStatus;

class AdminReservationUpdateComponent extends Component
{
    public $reservationId = null;
    public $status;

    public function mount($reservation_id)
    {
        $this->reservationId = $reservation_id;
        $reservation = Reservation::find($reservation_id);

        $this->status = $reservation->status;
    }

    public function updateReservation()
    {
        try{

            // dd($reservation);
            Reservation::where('id', $this->reservationId)->update(['status' => $this->status]);

            $reservation = Reservation::with('user')->where('id', $this->reservationId)->first();

            //send email here
            Mail::to($reservation->user->email)->send(new UpdateReservationStatus($reservation));

            $this->alertMessage('success','A reservation status has been updated');
            return redirect()->route('reservations.index');
        }catch(\Throwable $th){
            // dd($th);
        }
    }

        // Toast notifs
    // $type can be success, info, warning , error
    public function alertMessage($type, $message)
    {
        // $this->dispatchBrowserEvent(
        //     'alert',
        //     ['type' => $type,  'message' => $message]
        // );
        Toastr::$type($message, $type, ["positionClass" => "toast-top-right"]);
    }

    public function render()
    {
        $reservation = Reservation::where('id', $this->reservationId)->first();
        return view('livewire.admin-reservation-update-component', compact('reservation'));
    }
}
