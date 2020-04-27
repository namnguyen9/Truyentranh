<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class Logout extends Controller
{
    //
    public function logout()
    {
        Auth::logout();
        Session::flush();
        return Redirect::to('/');
    }
}
