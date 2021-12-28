<?php

namespace App\Http\Livewire;

use App\User;
use Throwable;
use App\Product;
use App\Service;
use Livewire\Component;
use App\ProductCategory;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;

class UserCreateComponent extends Component
{
    use WithPagination;
    use WithFileUploads;
    // listeners

    public $first_name = '';
    public $last_name ='';
    public $is_admin = 0;
    public $is_active = 1;
    public $img;
    public $email = '';
    public $password = '';
    public $password_confirmation = '';
    public $isUploaded = false;


    //rules
    protected function rules()
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'img' => 'nullable|image|max:1024',
        ];
    }


    protected $messages = [
        'img.max' => 'The image size should be less than 1mb',
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
            'img' => 'nullable|image|max:1024',
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
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'is_admin' => $this->is_admin,
            'is_active' => $this->is_active
        ];

        if($this->img){
            $data['img'] = time() . '_' . $this->img->getClientOriginalName();
            $this->img->storeAs('user_images', $data['img'], 'public');
        }


        try{
         User::create($data);
        }catch(Throwable $th){
            // dd($th);
        }

        $this->resetAll();

        $this->alertMessage('success','New user has been created');
        return redirect()->route('users.index')->with('success','New user has been created');
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
        //
    }

    public function render()
    {
        $users = User::all();

        return view('livewire.user-create-component',[
            'users' => $users,
        ]);
    }
}





