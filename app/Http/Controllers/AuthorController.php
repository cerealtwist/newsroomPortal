<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\File;
use App\Models\Setting;

class AuthorController extends Controller
{
    public function index(Request $request){
        return view('backend.pages.home');
    }

    public function logout(){
        Auth::guard('web')->logout();
        return redirect()->route('author.login');
    }

    public function ResetForm(Request $request, $token = null){
        $data = [
            'pageTitle' => 'Reset Password',
        ];
        return view('backend.pages.auth.reset', $data)->with(['token' => $token, 'email' => $request->email]);
    }

    public function changeProfilePicture(Request $request){
        $user = User::find(auth('web')->id());
        $path = '../backend/assets/img/avatars/';
        $file = $request->file('file');
        $old_picture = $user->getAttributes()['picture'];
        $file_path = $path.$old_picture;
        $new_picture_name ='AIMG'.$user->id.time().rand(1,100000).'.jpg';

        if($old_picture != null && File::exists(public_path($file_path))){
            File::delete(public_path($file_path));
        }
        $upload = $file->move(public_path($path), $new_picture_name);
        if($upload){
            $user->update([
                'picture'=>$new_picture_name
            ]);
            return response()->json(['status' => 1, 'message' => 'Profile picture was updated successfully']);
        }else{
            return response()->json(['status' => 0, 'Something wrong']);
        }

    }

    public function changeBlogLogo(Request $request){
        $settings = Setting::find(1);
        $logo_path = 'backend/assets/img/logo/';
        $old_logo = $settings->getAttributes()['blog_logo'];
        $file = $request->file('blog_logo');
        $filename = time().'_'.rand(1, 100000).'_bntv_logo.png';

        if($request->hasFile('blog_logo')){
            if($old_logo != null && File::exists(public_path($logo_path.$old_logo))){
                File::delete(public_path($logo_path.$old_logo));
            }
            $upload = $file->move(public_path($logo_path), $filename);

            if($upload){
                $settings->update([
                    'blog_logo'=>$filename
                ]);
                return response()->json(['status'=>1, 'msg'=>'Logo  has been updated.']);
            }else{
                return response()->json(['status'=>0, 'msg'=>'Something went wrong']);
            }

        }
    }

    public function changeBlogIcon(Request $request){
        $settings = Setting::find(1);
        $icon_path = 'backend/assets/img/favicon/';
        $old_icon = $settings->getAttributes()['blog_icon'];
        $file = $request->file('blog_icon');
        $filename = time().'_'.rand(1, 100000).'_bntv_icon.ico';

        if($old_icon != null && File::exists(public_path($icon_path.$old_icon))){
            File::delete(public_path($icon_path.$old_icon));
        }
        
        $upload = $file->move(public_path($icon_path), $filename);

        if($upload){
            $settings->update([
                'blog_icon'=>$filename
            ]);
            return response()->json(['status'=>1, 'msg'=>'Icon  has been updated.']);
        }else{
            return response()->json(['status'=>0, 'msg'=>'Something went wrong']);
        }

    }
}

