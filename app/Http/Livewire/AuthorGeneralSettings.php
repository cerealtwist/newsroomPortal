<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Setting;

class AuthorGeneralSettings extends Component
{

    public $settings;

    public $blog_name, $blog_email, $blog_desc;

    public function mount(){
        $this->settings = Setting::find(1);
        $this->blog_name = $this->settings->blog_name;
        $this->blog_email = $this->settings->blog_email;
        $this->blog_desc = $this->settings->blog_desc;
    }

    public function updateGeneralSettings(){
        $this->validate([
            'blog_name' => 'required',
            'blog_email' => 'required|email',
        ]);

        $update = $this->settings->update([
            'blog_name' => $this->blog_name,
            'blog_email' => $this->blog_email,
            'blog_desc' => $this->blog_desc,
        ]);

        if($update){
            $this->showToastr('Settings updated.', 'success');
        }else{
            $this->showToastr('Something went wrong!', 'error');
        }
    }

    public function showToastr($message, $type){
        return $this->dispatchBrowserEvent('showToastr', [
            'type' => $type,
            'message' => $message
        ]);
    }

    public function render()
    {
        return view('livewire.author-general-settings');
    }
}
