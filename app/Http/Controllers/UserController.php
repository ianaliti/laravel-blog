<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function login(Request $request) {
        $incomingfields = $request->validate([
            'loginname' => 'required',
            'loginpassword' => 'required',
        ]);

        if (Auth::attempt(['name' => $incomingfields['loginname'], 'password' => $incomingfields['loginpassword']])) {
            $request->session()->regenerate();
        }

        return redirect('/userhome');
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }

    public function formsubmitted(Request $request) {
            $incomingFields = $request->validate([
                    'name' => ['required', 'min:3', 'max:30', Rule::unique('users', 'name')],
                    'email' => ['required', 'min:5', 'max:30', 'email', Rule::unique('users','email')],
                    'password' => ['required', 'min:5', 'max:100']
                ]);
            
                // $name = $request->input('name');
                // $email = $request->input('email');

                $incomingFields['password'] = bcrypt($incomingFields['password']);
               
                $user = User::create($incomingFields);
                Auth::login($user);
                return redirect('/userhome');

    }
}
