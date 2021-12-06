<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

   protected function rules() {
       return [
        'email' => 'required|email',
        'password' => 'required|string|max:255',
       ];
   }

   public function mount(){
    //    dd('mounted');
   }

    public function test(){
        dd('testing');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $validatedData = $this->validate();
    }

    public function render()
    {
        return view('livewire.login');
    }
}
