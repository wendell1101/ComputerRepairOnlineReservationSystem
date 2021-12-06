<?php

namespace App\Http\Livewire;

use Throwable;
use App\Product;
use Livewire\Component;
use App\ProductCategory;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class ProductComponent extends Component
{
    use WithPagination;
    use WithFileUploads;
    // listeners

    public $name = '';
    public $price = 0;
    public $description ='';
    public $discount = 0;
    public $img;

    // get category id for deletion
    public $productIdDelete = null;
    public $productIdUpdate= null;

    public $selectedProductForUpdate = [];

    //rules
    protected function rules()
    {
        return [
            'name' => 'required|max:255',
            'price' => 'required',
            'description' => 'nullable',
            'discount' => 'required',
            'img' => 'required|img',
        ];
    }

    public function mount()
    {

        //reassign fields
    }

    // public function updated($propertyName)
    // {
    //     $this->validateOnly($propertyName);
    // }

    // Toast notifs
    // $type can be success, info, warning , error
    public function alertMessage($type, $message)
    {
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => $type,  'message' => $message]
        );
    }


    public function store()
    {
        dd('test');
        $validatedData = $this->validate();

        dd($validatedData);

        $data = [
            'name' => $this->name,
            'price' => $this->price,
            'description' => $this->description,
            'discount' => $this->discount,
            'product_category_id' => $this->product_category_id,
        ];

        if(request()->hasFile('img')){
            $data['img'] = time() . '_' . $this->img->getClientOriginalName();
            $this->img->storeAs('product_images', $data['img'], 'public');
        }

        Product::create($data);


        $this->resetAll();
        $this->index();

        $this->alertMessage('success','New product has been created');
    }

    public function updateProduct()
    {
        // dd('test');
        // $validatedData = $this->validate();

        // ProductCategory::where('id', $this->categoryIdUpdate)
        // ->update(['name' => $this->updateName]);


        // $this->index();
        // $this->resetAll();

        // $this->dispatchBrowserEvent('close-modal');

        // $this->alertMessage('success','Product has been updated');

    }

    // set category id to be deleted
    public function setProductIdDelete($id)
    {
        $this->categoryIdDelete = $id;
    }

     // set category id to be updated
     public function setProductIdUpdate($id)
     {
         $this->productIdDelete = $id;
         $product = Product::find($id);
        //  $this->updateName = $product->name;
         $this->selectedProductForUpdate = $product;
     }

    public function destroy()
    {
        try{
            $product =  Product::find($this->productIdDelete);
            $product->delete();
            $this->resetAll();

            $this->alertMessage('success', 'A product has been deleted');
        }catch(Throwable $th){
            // ignore error
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
        $this->categoryIdDelete = null;
        $this->name = '';
        $this->updateName = '';
        $this->selectedCategoryForUpdate = [];
    }

    public function render()
    {
        $products = Product::all();
        $categories = ProductCategory::all();

        return view('livewire.product-component',[
            'products' => $products,
            'categories' => $categories
        ]);
    }
}
