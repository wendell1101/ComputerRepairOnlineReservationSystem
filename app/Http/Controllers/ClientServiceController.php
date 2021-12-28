<?php

namespace App\Http\Controllers;

use App\ServiceCategory;
use Illuminate\Http\Request;

class ClientServiceController extends Controller
{
    public function index()
    {
        $service_categories = ServiceCategory::with('services')->get();

        return view('user.service-fees', compact('service_categories'));
    }
}
