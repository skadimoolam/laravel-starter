<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

class AuthController
{
    public function login(Request $request)
    {
        $validator = validator()->make(request()->all(), [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) return back()->withErrors($validator)->withInput(request()->all());


        $canLogin = auth()->guard('web')
                        ->attempt(
                            ['email' => request('email'), 'password' => request('password'), 'status' => 'active'],
                            $request->filled('remember')
                        );

        if (!$canLogin) return back()->with('message', 'Email or Password wrong.');

        $request->session()->regenerate();
        return redirect()->route('backend.dash');
    }

    public function logout(Request $request) {
        auth()->guard()->logout();
        $request->session()->invalidate();
        return redirect()->route('backend.login');
    }
}
