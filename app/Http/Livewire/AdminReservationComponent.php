<?php

namespace App\Http\Livewire;

use App\Reservation;
use Livewire\Component;

class AdminReservationComponent extends Component
{
    public function mount()
    {

    }
    public function render()
    {
        $reservations = Reservation::with('user')->orderBy('created_at', 'DESC')->get();
        return view('livewire.admin-reservation-component', compact('reservations'));
    }
}
