<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Nette\Utils\Random;



class Authors extends Component
{

    public $name, $email, $username, $author_type, $direct_publisher;

    protected $listeners = [
        'resetForms'
    ];
    
    public function resetForms(){
        $this->name = $this->email = $this->username = $this->author_type = $this->direct_publisher = null;

        $this->resetErrorBag();
    }

    public function addAuthor(){
        
        // $this->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users,email',
        //     'username' => 'required|unique:users,username|min:6|max:20',
        //     'author_type' => 'required',
        //     'direct_publisher' => 'required',
        // ],[
        //     'author_type.required'=>'Choose author type',
        //     'direct_publisher.required'=>'Specify author access',
        // ]);

        if($this->isOnline()){
            $default_password = Random::generate(8);
    
            $author = new User([
                'name' => $this->name,
                'email' => $this->email,
                'username' => $this->username,
                'password' => Hash::make($default_password),
                'type' => $this->author_type,
                'direct_publish' => $this->direct_publisher,
            ]);
            $saved = $author->save();

            $data = array(
                'name' => $this->name,
                'username' => $this->username,
                'email' => $this->email,
                'password' => $default_password,
                'url' => route('author.profile'),
            );

            $author_email = $this->email;
            $author_name = $this->name;

            if($saved){
                Mail::send('author-email-template', $data, function($message) use ($author_email, $author_name){
                    $message->from('noreply@example.com', 'Bumiayu News');
                    $message->to($author_email, $author_name)->subject('Account Creation');
                });

                $this->showToastr('New author has been created','success');
                $this->name = $this->email = $this->username = $this->author_type = $this->direct_publisher = null;
                $this->dispatchBrowserEvent('hide_author_modal');
            }

        }else{
            $this->showToastr('You are offline, please check your connection','error');
        }
    }

    public function showToastr($message, $type) {
        return $this->dispatchBrowserEvent('showToastr', [
            'type'=>$type,
            'message'=>$message
        ]);
    }

    public function isOnline($site = "https://youtube.com/"){
        if(@fopen($site, "r")){
            return true;
        }else{
            return false;
        }
    }

    public function render()
    {
        return view('livewire.authors',[
            'authors'=>User::where('id', '!=', auth()->id())->get(),
        ]);
    }
}
