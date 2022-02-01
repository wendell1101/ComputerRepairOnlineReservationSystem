<?php

namespace App\Http\Livewire;

use Throwable;
use Livewire\WithPagination;
use Livewire\Component;
use App\ServiceCategory;
use stdClass;

class ServiceCategoryComponent extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    // listeners

    protected $listeners = [
        'forcedCloseModal'
    ];


    // public $categories = [];

    // fields
    public $name;
    public $updateName;


    // get category id for deletion
    public $categoryIdDelete = null;
    public $categoryIdUpdate= null;

    public $selectedCategoryForUpdate = [];

    //rules
    protected function rules()
    {
        return [
            'name' => 'required|unique:service_categories|max:255',
        ];
    }

    protected $messages = [
        'name.unique' => 'Category name already exists. Please try a new one',
    ];

    public function mount()
    {
        $this->index();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
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


    public function index()
    {
        return $this->render();
    }

    public function store()
    {
        $validatedData = $this->validate();

        ServiceCategory::create([
            'name' => $validatedData['name']
        ]);

        $this->resetAll();
        $this->index();

        $this->alertMessage('success','New category has been created');
    }

    public function updateCategory()
    {
        // dd('test');
        // $validatedData = $this->validate();

        try{
            ServiceCategory::where('id', $this->categoryIdUpdate)
            ->update(['name' => $this->updateName]);
        }catch(Throwable $th){
            // ignore error if any
        }



        $this->index();
        $this->resetAll();

        $this->dispatchBrowserEvent('close-modal');

        $this->alertMessage('success','Category has been updated');

    }

    // set category id to be deleted
    public function setCategoryIdDelete($id)
    {
        $this->categoryIdDelete = $id;

    }

     // set category id to be updated
     public function setCategoryIdUpdate($id)
     {
         $this->categoryIdUpdate = $id;
         $category = ServiceCategory::find($id);
         $this->updateName = $category->name;
         $this->selectedCategoryForUpdate = $category;
     }

    public function destroy()
    {
        try{
            $category =  ServiceCategory::find($this->categoryIdDelete);
            if ($category->services->count() > 0) {
                $this->alertMessage('error','Cannot delete category with active service');
            } else {
                $category->delete();
                $this->index();
                $this->resetAll();

                $this->alertMessage('success', 'A category has been deleted');

            }
        }catch(Throwable $th){
            // ignore error
            // dd('error: ' .$th);
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
        $categories = ServiceCategory::paginate(config('app.PAGINATION_LIMIT'));
        return view('livewire.service-category-component', compact('categories'));
    }
}
