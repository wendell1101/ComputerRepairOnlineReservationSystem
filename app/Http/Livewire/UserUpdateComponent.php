<?php

namespace App\Http\Livewire;

use App\User;
use Throwable;
use App\Service;
use Livewire\Component;
use App\ProductCategory;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserUpdateComponent extends Component
{
    use WithPagination;
    use WithFileUploads;
    // listeners

    public $user = [];

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


    public function mount($user)
    {
        //reassign fields
        $this->user = $user;
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->email = $user->email;
        $this->password = $user->password;
        $this->img = $user->img;
        $this->is_active = $user->is_active;
        $this->is_admin = $user->is_admin;
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


    public function updateUser()
    {
        $data = [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'is_admin' => $this->is_admin,
            'is_active' => $this->is_active
        ];

        if($this->user['img'] != $this->img){
            Storage::delete('public/user_images/' . $this->user['img']);
            $data['img'] = time() . '_' . $this->img->getClientOriginalName();
            $this->img->storeAs('user_images', $data['img'], 'public');
        }

        try{
            User::where('id', $this->user['id'])->update($data);
        }catch(Throwable $th){
            // dd('error: ' . $th);
        }


        $this->resetAll();

          $this->alertMessage('success','User has been updated');
        // Toastr::success('New product has been updated', 'success', ["positionClass" => "toast-top-right"]);
        return redirect()->route('users.index')->with('success','User has been updated');
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
        // $this->name = '';
        // $this->min_price = 0;
        // $this->max_price = 0;
        // $this->description ='';
        // $this->is_available = 0;
        // $this->img;
    }

    public function render()
    {
        $user = User::find($this->user['id']);

        return view('livewire.user-update-component',[
            'user' => $user,
        ]);
    }
}





