<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthorResetForm extends Component
{
    public $email, $token, $new_password, $confirm_new_password;

    public function mount(){
        $this->email = request()->email;
        $this->token = request()->token;

    }

    public function ResetHandler() {
        $this->validate([
            'email' => 'required|email|exists:users,email',
            'new_password' => 'required|min:5',
            'confirm_new_password' => 'same:new_password',
        ],[
            'email.required' => 'The email field is required',
            'email.email' => 'Invalid email address',
            'email.exists' => 'The email is not registered',
            'new_password.required' => 'Enter a new password',
            'new_password.min' => 'Password must be at least 5 characters long!',
            'confirm_new_password' => 'Password does not match!'
        ]);

        $check_token = DB::table('password_resets')->where([
            'email'=>$this->email,
            'token'=>$this->token,
        ])->first();

        if(!$check_token){
            session()->flash('fail', 'Invalid Token.');
        }else{
            User::where('email', $this->email)->update([
                'password' => Hash::make($this->new_password)
            ]);
            DB::table('password_resets')->where([
                'email'=>$this->email
            ])->delete();

            $succes_token = Str::random(64);
            session()->flash('success', 'Your password has successfully changed.');

            $this->redirectRoute('author.login', ['token'=>$succes_token,'UEmail'=>$this->email]);
        }

    }

    public function render()
    {
        return view('livewire.author-reset-form');
    }
}
