<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Product;
use App\Service;
use App\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DateTime;

class AdminController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $usersCount = User::all()->count();
        $reservationsCount = Reservation::all()->count();
        $productsCount = Product::all()->count();
        $servicesCount = Service::all()->count();

        $data = [
            'usersCount' => $usersCount,
            'reservationsCount' => $reservationsCount,
            'productsCount' => $productsCount,
            'servicesCount' => $servicesCount,
            'reservations' => $this->getReservationCountByMonth()
        ];


        return view('admin.dashboard', $data);
    }

    public function getReservationCountByMonth()
    {
        $data = [
            'jan' => 0,
            'feb' => 0,
            'mar' => 0,
            'april' => 0,
            'may' => 0,
            'june' => 0,
            'july' => 0,
            'aug' => 0,
            'sept' => 0,
            'oct' => 0,
            'nov' => 0,
            'dec' => 0,
            'year' => date("Y"),
        ];

        $reservations = Reservation::all();

        foreach ($reservations as $reservation) {
            $date = $this->formatDate($reservation->created_at);
            if (strpos(strtolower($date), 'jan') !== false) {
                $data['jan']++;
            } else if (strpos(strtolower($date), 'feb') !== false) {
                $data['feb']++;
            } else if (strpos(strtolower($date), 'mar') !== false) {
                $data['mar']++;
            } else if (strpos(strtolower($date), 'apr') !== false) {
                $data['april']++;
            } else if (strpos(strtolower($date), 'may') !== false) {
                $data['may']++;
            } else if (strpos(strtolower($date), 'june') !== false) {
                $data['june']++;
            } else if (strpos(strtolower($date), 'july') !== false) {
                $data['july']++;
            } else if (strpos(strtolower($date), 'aug') !== false) {
                $data['aug']++;
            } else if (strpos(strtolower($date), 'september') !== false) {
                $data['sept']++;
            } else if (strpos(strtolower($date), 'october') !== false) {
                $data['oct']++;
            } else if (strpos(strtolower($date), 'november') !== false) {
                $data['nov']++;
            } else if (strpos(strtolower($date), 'december') !== false) {
                $data['dec']++;
            }
        }
        return $data;
    }

    public function formatDate($date)
    {
        $d = new DateTime($date);
        return $d->format("F j \, Y \, g:ia \,\n l ");
    }

}
