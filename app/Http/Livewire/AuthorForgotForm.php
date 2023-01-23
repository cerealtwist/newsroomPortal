<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthorForgotForm extends Component
{
    public $email;

    public function ForgotHandler(){
        $this->validate([
            'email' =>'required|email|exists:users,email',
        ],[
            'email.required' =>'The :attribute is required!',
            'email.email' =>'Invalid email address',
            'email.exists' =>'The :attribute is not registered.',
        ]);

        $token = base64_encode(Str::random(64));
        DB::table('password_resets')->insert([
            'email'=>$this->email,
            'token'=>$token,
            'created_at'=>Carbon::now(),
        ]);
        $user = User::where('email', $this->email)->first();
        $link = route('author.reset-form', ['token'=>$token, 'email'=>$this->email]);
        $body_message = "We have received a password reset request for <b>News.tv</b> associated with ".$this->email.". <br> Reset your password by clicking the this link below.";
        $body_message.='<br>';
        $body_message.='<a href="'.$link.'" target="_blank" style="color:blue">Reset Password</a>';
        $body_message.='<br>';
        $body_message.='Ignore this message if you did not request any password reset.';

        $data = array(
            'name' => $user->name,
            'body_message' => $body_message,
        );

        Mail::send('forgot-email-template', $data, function($message) use ($user) {
            $message->from('noreply@example.com','newstv');
            $message->to($user->email, $user->name)
                    ->subject('Reset Password');
        });
        $this->email = null;
        session()->flash('success', 'Password has been reset successfully, please check your email address');
    }

    public function render()
    {
        return view('livewire.author-forgot-form');
    }
}
