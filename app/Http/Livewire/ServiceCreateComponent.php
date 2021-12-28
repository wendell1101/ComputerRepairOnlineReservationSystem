<?php

namespace App\Http\Livewire;

use Throwable;
use App\Product;
use App\Service;
use Livewire\Component;
use App\ServiceCategory;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Brian2694\Toastr\Facades\Toastr;

class ServiceCreateComponent extends Component
{
    use WithPagination;
    use WithFileUploads;
    // listeners

    public $name = '';
    public $description ='';
    public $is_available = 1;
    public $img;
    public $price = 0;
    public $isUploaded = false;
    public $service_category_id;

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
            'service_category_id' => 'required',
        ];
    }


    protected $messages = [
        'price.regex' => 'The price should only have two decimal places.',
        'img.max' => 'The image size should be less than 1mb',
        'service_category_id.required' => 'You must select a category',
    ];

    public function mount()
    {

        //reassign fields
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
        // if($this->min_price > $this->max_price){
        //     $this->addError('min_price', "Minimum price should be less than maximum price");
        // }
    }

    public function updatedImg()
    {
        $this->validate([
            'img' => 'required|image|max:1024',
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


    public function store()
    {
        $validatedData = $this->validate();


        $data = [
            'name' => $this->name,
            'price' => $this->price,
            'description' => $this->description,
            'is_available' => $this->is_available,
            'img' => time() . '_' . $this->img->getClientOriginalName(),
            'service_category_id' => $this->service_category_id
        ];

        $this->img->storeAs('service_images', $data['img'], 'public');
        try{
         Service::create($data);
        }catch(Throwable $th){
            // dd($th);
        }

        $this->resetAll();

        $this->alertMessage('success','New service has been created');
        return redirect()->route('services.index')->with('success','New service has been created');
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
        $this->name = '';
        $this->min_price = 0;
        $this->max_price = 0;
        $this->description ='';
        $this->is_available = 0;
        $this->img;
    }

    public function render()
    {
        $services = Product::all();

        $categories = ServiceCategory::all();

        return view('livewire.service-create-component',[
            'services' => $services,
            'categories' => $categories
        ]);
    }
}





