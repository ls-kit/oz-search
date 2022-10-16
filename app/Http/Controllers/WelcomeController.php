<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('auth.login');
    }

    public function welcome()
    {
        $data['setting'] = Setting::where('shop_id', Auth::user()->name)->first();
        
        return view('welcome', $data);
    }
}
