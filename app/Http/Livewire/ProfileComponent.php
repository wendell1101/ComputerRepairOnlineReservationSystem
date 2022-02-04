<?php

namespace App\Http\Livewire;

use App\User;
use Throwable;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileComponent extends Component
{
    public $user = [];
    public $first_name = '';
    public $last_name = '';
    public $email = '';
    public $img;
    public $fb_link = '';
    public $contact_number = '';
    public $house_number = '';
    public $street = '';
    public $barangay = '';
    public $province = '';
    public $city = '';
    public $zip_code = '';
    public $country = '';
    public $address = '';
    public $password = '';

    protected $rules = [
        'first_name' => 'required|max:255',
        'last_name' => 'required|max:255',
        'email' => 'required|email',
        'fb_link' => 'nullable|url',
        'contact_number' => ['required', 'regex:/^(09|\+639)\d{9}$/'],
        'house_number' => 'required|max:255',
        'street' => 'required|max:255',
        'barangay' => 'required|max:255',
        'city' => 'required|max:255',
        'province' => 'required|max:255',
        'zip_code' => 'required|max:50',
        'country' => 'required|max:255',
        // 'address' => 'required|max:255',
    ];

    public function mount()
    {
        $this->user = auth()->user();
        $this->first_name = auth()->user()->first_name;
        $this->last_name = auth()->user()->last_name;
        $this->email = auth()->user()->email;
        $this->fb_link = auth()->user()->fb_link;
        $this->contact_number = auth()->user()->contact_number;
        $this->house_number = auth()->user()->house_number;
        $this->street = auth()->user()->street;
        $this->barangay = auth()->user()->barangay;
        $this->city = auth()->user()->city;
        $this->province = auth()->user()->province;
        $this->zip_code = auth()->user()->zip_code;
        $this->country = auth()->user()->country;
        $this->address = auth()->user()->address;
        $this->password = auth()->user()->password;
    }

    public function updatedImg()
    {
        $this->validate([
            'img' => 'nullable|image|max:1024',
        ]);
        $this->isUploaded = true;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updateProfile()
    {
        $validatedData = $this->validate();
        // dd($validatedData);
        $address = "$this->house_number, $this->street, $this->barangay, $this->province, $this->zip_code, $this->country";
        // dd(strtolower($address));
        $data = [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            // 'img' => $this->img,
            'contact_number' => $this->contact_number,
            'house_number' => $this->house_number,
            'street' => $this->street,
            'barangay' => $this->barangay,
            'city' => $this->city,
            'province' => $this->province,
            'zip_code' => $this->zip_code,
            'country' => $this->country,
            'address' => $address,
        ];

        // if($this->user['img'] != $this->img){
        //     Storage::delete('public/user_images/' . $this->user['img']);
        //     $data['img'] = time() . '_' . $this->img->getClientOriginalName();
        //     $this->img->storeAs('user_images', $data['img'], 'public');
        // }

        try{
            User::where('id', auth()->id())->update($data);
            return redirect()->back()->with('success', 'Profile has been updated successfully');
        }catch(Throwable $th){
            // dd($th);
        }


        $this->alertMessage('success','Your profile has been updated');

    }

    public function alertMessage($type, $message)
    {
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => $type,  'message' => $message]
        );
    }

    public function render()
    {
        return view('livewire.profile-component');
    }
}
