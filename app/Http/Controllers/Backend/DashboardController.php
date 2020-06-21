<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

class DashboardController
{
    public function show(Request $request)
    {
        $data = [];
        return view('backend.dash', compact('data'));
    }
}
