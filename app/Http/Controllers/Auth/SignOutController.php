<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SignOutController extends BaseController
{
    public function logoutAccount()
    {
        Auth::logout(); 

        Session::forget('user'); 

        return redirect('/');
    }
}
