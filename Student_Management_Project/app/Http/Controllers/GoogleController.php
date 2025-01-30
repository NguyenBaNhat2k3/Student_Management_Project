<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    //
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();

            // Tìm kiếm người dùng qua google_id
            //$finduser = User::where('google_id', $user->google_id)->first(); dang errored

            // Nếu người dùng đã tồn tại (đăng nhập qua Google)
            $finduser = User::where('email', $user->email)->first();
            if($finduser){
                Auth::login($finduser);
                return redirect()->intended('/home');
            }else{
                $newUser = User::create([

                    'name' => $user->name,

                    'email' => $user->email,

                    'google_id'=> $user->id,

                    'password' => encrypt('12345678')
                ]);
                Auth::login($newUser);
                return redirect()->intended('/home');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }

    }

    public function googleLogout() {
        Auth::logout(); // Đăng xuất người dùng
        session()->invalidate(); // Xóa toàn bộ session
        session()->regenerateToken(); // Tạo token mới để bảo mật
        return redirect()->intended('/home');
    }
}
