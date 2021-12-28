<?php

namespace App\Http\Livewire;

use Throwable;
use App\Product;
use App\Service;
use Livewire\Component;
use App\ProductCategory;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Storage;

class ServiceUpdateComponent extends Component
{
    use WithPagination;
    use WithFileUploads;
    // listeners

    public $service = [];
    public $name = '';
    public $description ='';
    public $is_available = 1;
    public $img;
    public $price = 0;
    public $isUploaded = false;

    public $serviceIdDelete = null;


    //rules
    protected function rules()
    {
        return [
            'name' => 'required|max:100',
            'price' => ['required', 'numeric', 'min:1', 'max:100000000000', 'regex:/^\d+(\.\d{1,2})?$/'],
            'description' => 'nullable',
            'is_available' => 'boolean',
            'img' => 'required|image|max:1024',
        ];
    }


    protected $messages = [
        'price.regex' => 'The price should only have two decimal places.',
        'img.max' => 'The image size should be less than 1mb',
    ];


    public function mount($service)
    {
        //reassign fields
        $this->service = $service;
        $this->name = $service->name;
        $this->price = $service->price;
        $this->description = $service->description;
        $this->is_available = $service->is_available;
        $this->img = $service->img;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updatedImg()
    {
        $this->validate([
            'img' => 'image|max:1024',
        ]);
        $this->isUploaded = true;
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


    public function updateService()
    {
        $data = [
            'name' => $this->name,
            'price' => $this->price,
            'description' => $this->description,
            'is_available' => $this->is_available,
        ];

        if($this->service['img'] != $this->img){
            Storage::delete('public/service_images/' . $this->service['img']);
            $data['img'] = time() . '_' . $this->img->getClientOriginalName();
            $this->img->storeAs('service_images', $data['img'], 'public');
        }

        try{
            Service::where('id', $this->service['id'])->update($data);
        }catch(Throwable $th){
            // dd('error: ' . $th);
        }


        $this->resetAll();

          $this->alertMessage('success','Service has been updated');
        // Toastr::success('New product has been updated', 'success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('services.index')->with('success','Service has been updated');
    }




    public function resetAll()
    {
        // This is to reset our public variables
        $this->cleanVars();

        // These will reset our error bags
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function cleanVars(){
        // $this->name = '';
        // $this->min_price = 0;
        // $this->max_price = 0;
        // $this->description ='';
        // $this->is_available = 0;
        // $this->img;
    }

    public function render()
    {
        return view('livewire.service-update-component',[
            'service' => $this->service,
        ]);
    }
}





