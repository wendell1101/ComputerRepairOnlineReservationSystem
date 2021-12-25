<?php

namespace App\Http\Livewire;

use Throwable;
use App\Product;
use Livewire\Component;
use App\ProductCategory;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Storage;

class ProductUpdateComponent extends Component
{
    use WithPagination;
    use WithFileUploads;
    // listeners

    public $product = [];
    public $name = '';
    public $price = 0;
    public $description ='';
    public $discounted_price = 0;
    public $discount_percentage = 0;
    public $discount_start_date = null;
    public $discount_end_date = null;
    public $has_discount = 0;
    public $is_available = 0;
    public $is_featured = 0;
    public $img;
    public $product_category_id;
    public $isUploaded = false;


    //rules
    protected function rules()
    {
        return [
            'name' => 'required|max:100',
            'price' => ['required', 'numeric', 'min:1', 'max:100000000000', 'regex:/^\d+(\.\d{1,2})?$/'],
            'discount_percentage' => ['numeric', 'min:0', 'max:100000000000', 'regex:/^\d+(\.\d{1,2})?$/'],
            'discounted_price' => ['numeric', 'min:0', 'max:100000000000', 'regex:/^\d+(\.\d{1,2})?$/'],
            'discount_start_date' => 'nullable|date',
            'discount_end_date' => 'nullable|date',
            'description' => 'nullable',
            'is_available' => 'boolean',
            'is_featured' => 'boolean',
            'has_discount' => 'boolean',
            'product_category_id' => 'required',
        ];
    }


    protected $messages = [
        'price.regex' => 'The price should only have two decimal places.',
        'img.max' => 'The image size should be less than 1mb',
        'product_category_id.required' => 'You must select a category',
    ];

    public function mount($product)
    {
        $this->product = $product;
        //reassign fields
        $this->name = $product->name;
        $this->price = $product->price;
        $this->description = $product->description;
        $this->discounted_price = $product->discount_price;
        $this->discount_percentage = $product->discount_percentage;
        $this->discount_start_date = $product->discount_start_date;
        $this->discount_end_date = $product->discount_end_date;
        $this->has_discount = $product->has_discount;
        $this->is_available = $product->is_available;
        $this->is_featured = $product->is_featured;
        $this->img = $product->img;
        $this->product_category_id = $product->product_category_id;
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


    public function updateProduct()
    {
        $hasDiscount = false;

        if($this->discount_percentage === 0 && $this->discount_start_date === NULL
            && $this->discount_end_date == NULL){
            $hasDiscount = true;
        }

        $data = [
            'name' => $this->name,
            'price' => $this->price,
            'description' => $this->description,
            'discount_percentage' => $this->discount_percentage,
            'discounted_price' => $this->get_discounted_price(),
            'discount_start_date' => $this->discount_start_date,
            'discount_end_date' => $this->discount_end_date,
            'product_category_id' => $this->product_category_id,
            'is_available' => $this->is_available,
            'is_featured' => $this->is_featured,
            'has_discount' => $hasDiscount,
        ];

        if($this->product['img'] != $this->img){
            Storage::delete('public/product_images/' . $this->product['img']);
            $data['img'] = time() . '_' . $this->img->getClientOriginalName();
            $this->img->storeAs('product_images', $data['img'], 'public');
        }

        try{
            Product::where('id', $this->product['id'])->update($data);
        }catch(Throwable $th){
            // dd('error: ' . $th);
        }


        $this->resetAll();

          $this->alertMessage('success','Product has been updated');
        // Toastr::success('New product has been updated', 'success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('products.index')->with('success','New product has been updated');
    }




    public function resetAll()
    {
        // This is to reset our public variables
        // $this->cleanVars();

        // These will reset our error bags
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function cleanVars(){
        $this->name = '';
        $this->price = 0;
        $this->description ='';
        $this->discount_percentage = 0;
        $this->img;
        $this->product_category_id = null;

    }

    public function get_discounted_price()
    {
        $discountedPrice = $this->price * ($this->discount_percentage * .01);
        return $this->price - $discountedPrice;
    }

    public function render()
    {
        $categories = ProductCategory::all();

        return view('livewire.product-update-component',[
            'product' => $this->product,
            'categories' => $categories
        ]);
    }
}





