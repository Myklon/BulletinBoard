<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        $meta = [
            'title' => 'Вход'
        ];
        return view('auth.login', compact('meta'));
    }
    public function login()
    {
        dd('dd');
    }
}
