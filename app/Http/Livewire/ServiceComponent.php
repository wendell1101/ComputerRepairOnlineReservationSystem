<?php

namespace App\Http\Livewire;

use Throwable;
use App\Product;
use Livewire\Component;
use App\ServiceCategory;
use App\Service;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ServiceComponent extends Component
{
    use WithPagination;
    use WithFileUploads;
    // listeners

    protected $paginationTheme = 'bootstrap';

    public $name = '';
    public $description ='';
    public $is_available = 0;
    public $img;
    public $price = 0;
    public $isUploaded = false;

    public $serviceIdDelete = null;

    //rules

    public function mount()
    {

        //reassign fields
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
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
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => $type,  'message' => $message]
        );
    }


    // set category id to be deleted
    public function setServiceIdDelete($id)
    {
        $this->serviceIdDelete = $id;
    }

    public function destroy()
    {
        try{
            $service =  Service::find($this->serviceIdDelete);
            $service->delete();
            Storage::delete('public/service_images/' . $service->img);
            $this->resetAll();

            $this->alertMessage('success', 'A service has been deleted');
        }catch(Throwable $th){
            dd('error: '. $th);
        }
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
        $this->price = 0;
        $this->description ='';
        $this->is_available = 0;
        $this->img;
        $this->serviceIdDelete = null;
    }

    public function render()
    {
        $services = Service::paginate(config('app.PAGINATION_LIMIT'));
        $categories = ServiceCategory::all();

        return view('livewire.service-component',[
            'services' => $services,
            'categories' => $categories
        ]);
    }
}
