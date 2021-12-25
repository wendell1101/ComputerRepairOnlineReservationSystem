<?php

namespace App\Http\Livewire;

use Throwable;
use App\Product;
use Livewire\Component;
use App\ProductCategory;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ProductComponent extends Component
{
    use WithPagination;
    use WithFileUploads;
    // listeners

    protected $paginationTheme = 'bootstrap';

    public $name = '';
    public $price = 0;
    public $description ='';
    public $discounted_price = 0;
    public $discount_percentage = 0;
    public $discounted_start_date = null;
    public $discounted_end_date = null;
    public $has_discount = 0;
    public $is_available = 0;
    public $img;
    public $product_category_id;
    public $isUploaded = false;

    public $productIdDelete = null;

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
    public function setProductIdDelete($id)
    {
        $this->productIdDelete = $id;
    }

    public function destroy()
    {
        try{
            $product =  Product::find($this->productIdDelete);
            $product->delete();
            Storage::delete('public/product_images/' . $product->img);
            $this->resetAll();

            $this->alertMessage('success', 'A product has been deleted');
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
        $this->discount = 0;
        $this->img;
        $this->product_category_id = null;

        // get product id for deletion
        $this->productIdDelete = null;
    }

    public function render()
    {
        $products = Product::paginate(10);
        $categories = ProductCategory::all();

        return view('livewire.product-component',[
            'products' => $products,
            'categories' => $categories
        ]);
    }
}
