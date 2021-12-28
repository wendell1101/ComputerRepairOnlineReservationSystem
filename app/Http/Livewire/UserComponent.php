<?php

namespace App\Http\Livewire;

use Throwable;
use App\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class UserComponent extends Component
{
    use WithPagination;
    use WithFileUploads;
    // listeners

    protected $paginationTheme = 'bootstrap';

    public $userIdDelete = null;

    //rules

    public function mount()
    {

        //reassign fields
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


    // set category id to be deleted
    public function setUserIdDelete($id)
    {
        $this->userIdDelete = $id;
    }

    public function destroy()
    {
        try{
            $user =  User::find($this->userIdDelete);
            $user->delete();
            Storage::delete('public/user_images/' . $user->img);
            $this->resetAll();

            $this->alertMessage('success', 'A user has been deleted');
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
        $this->userIdDelete = null;
    }

    public function render()
    {
        $users = User::paginate(10);

        return view('livewire.user-component',[
            'users' => $users,
        ]);
    }
}
