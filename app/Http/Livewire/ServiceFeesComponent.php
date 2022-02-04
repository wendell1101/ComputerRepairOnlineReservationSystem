<?php

namespace App\Http\Livewire;

use App\Service;
use Livewire\Component;
use App\ServiceCategory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class ServiceFeesComponent extends Component
{
    // service detail view
    public $selectedService = [];
    public $selectServiceId = null;

    public function setSelectServiceId($id)
    {
        $this->selectServiceId = $id;
        $service = Service::find($this->selectServiceId);

        $service->within_discount_date = 0;

        if ($service->discounted_price > 0) {
            $start_date = date('Y-m-d', strtotime($service->discount_start_date));
            $end_date = date('Y-m-d', strtotime($service->discount_end_date));
            $current_date =  date('Y-m-d');
            if($current_date >= $start_date && $current_date <= $end_date){
                $service->within_discount_date = 1;
            }else{
                $service->within_discount_date = 0;
            }
            $service->discount_start_date = format_date($service->discount_start_date);
            $service->discount_end_date = format_date($service->discount_end_date);
        }

        // dd($this->selectServiceId)
        $this->selectedService = $service;
    }

    //Cart
    public function addToCart($serviceId, $quantity=1)
    {
        // get product
        $service = Service::findOrFail($serviceId);

        Cart::add(['id' => $service->id, 'name' => $service->name, 'qty' => $quantity,
        'price' => $service->price, 'weight' => 0, 'options' => ['type' => 'service']])->associate('App\Service');

        Session::flash('success', 'A service has been added to cart successfully');
        $this->alertMessage('success', 'A service has been added to cart successfully');
        return redirect(request()->header('Referer'));
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
        $service_categories = ServiceCategory::with('services')->get();
        return view('livewire.service-fees-component', compact('service_categories'));
    }
}
