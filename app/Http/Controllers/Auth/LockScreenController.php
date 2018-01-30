<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class LockScreenController extends Controller
{
    public function get()
    {
        if (Auth::check()) {
            Session::put('locked', true);

            return view('auth.lock');
        }

        $error = (session('error')) ? session('error') : null;

        return view(route('login'))
            ->with('error', $error);
    }

    public function post()
    {
        if (!Auth::check()) {
            return redirect(route('login'));
        }

        $password = Input::get('password');

        if (Hash::check($password, Auth::user()->password)) {
            Session::forget('locked');
            return redirect(route('accueil'));
        }
        return redirect()->route('lock.get')
            ->with('error', 'Erreur d\'authentification');
    }
}
