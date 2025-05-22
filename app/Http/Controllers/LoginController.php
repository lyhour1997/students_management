<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class LoginController extends Controller
{

    public function create()
    {
        return view('logins.index');
    }

    public function save(Request $r)
    {
        $data = array (
            'username' => $r->username,
            'password' => $r->password,
        );

        if( Auth::attempt($data) ){
            return redirect()->intended('/');

        }else{
            return redirect()->route('login')
                ->with('error','Invalid username or password !');

        }

    }




}
