<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.home.index');
    }
    public function language($code)
    {
    	session()->put('language_code', $code);
        return redirect()->back();
    }
}
