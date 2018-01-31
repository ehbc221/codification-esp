<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class LockScreenController extends Controller
{
    public function get()
    {
        $error = (session('error')) ? session('error') : null;

        if (Auth::check()) {
            Session::put('locked', true);

            return view('auth.lock')
                ->with('error', $error);
        }

        return view(route('login'));
    }

    public function post()
    {
        if (!Auth::check()) {
            return redirect(route('login'));
        }

        $password = Input::get('password');

        if (Hash::check($password, Auth::user()->password)) {
            Session::forget('locked');

            if ($user = (Auth::user())->role->name === 'admin'){
                return redirect()->intended(route('admin.dashboard'));
            }

            return redirect()->intended(route('student.dashboard'));
        }
        return redirect()->route('lock.get')
            ->with('error', 'Erreur d\'authentification');
    }
}
