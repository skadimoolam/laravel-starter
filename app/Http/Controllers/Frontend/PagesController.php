<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

class PagesController
{
    public function home(Request $request)
    {
        return view('frontend.home');
    }
}
