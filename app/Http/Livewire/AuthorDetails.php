<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class AuthorDetails extends Component
{

    public $author;
    public $name, $username, $email, $description;

    public function mount(){
        $this->author = User::find(auth('web')->id());
        $this->name = $this->author->name;
        $this->username = $this->author->username;
        $this->email = $this->author->email;
        $this->description = $this->author->description;
    }

    public function UpdateDetails(){
        $this->validate([
            'name' =>'required|string',
            'username' =>'required|unique:users,username,'.auth('web')->id()
        ]);

        User::where('id', auth('web')->id())->update([
            'name' => $this->name,
            'username' => $this->username,
            'description' => $this->description
        ]);

        $this->emit('updateTopHeader');

        $this->showToastr('Profile updated successfully.','success');
    }

    public function showToastr($message, $type){
        return $this->dispatchBrowserEvent('showToastr',[
            'type' => $type,
            'message' => $message
        ]);
    }

    public function render()
    {
        return view('livewire.author-details');
    }
}
