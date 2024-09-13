<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getAllHotels()
    {
        
        $hotels = DB::table('hotels')->get();
        $user = Auth::user();

        return view('home', ['hotels' => $hotels, 'user' => $user]);
    }
    
    
}
