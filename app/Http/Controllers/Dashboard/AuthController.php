<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('dashboard.auth.login');
    }

    public function attemptUser(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|max:191',
            'password' => 'required|string',
        ]);

        $validData = auth()->attempt(['email' => $data['email'], 'password' => $data['password']]);
        if (!$validData) {
            return back();
        } else {
            return redirect(route('admin.home'));
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect(route('admin.login'));
    }
}
