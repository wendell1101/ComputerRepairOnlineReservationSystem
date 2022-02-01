<?php

namespace App\Http\Livewire;
use Livewire\WithPagination;
use App\Reservation;
use Livewire\Component;

class AdminReservationComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function mount()
    {

    }
    public function render()
    {
        $reservations = Reservation::with('user')->orderBy('created_at', 'DESC')->paginate(config('app.PAGINATION_LIMIT'));
        return view('livewire.admin-reservation-component', compact('reservations'));
    }
}
