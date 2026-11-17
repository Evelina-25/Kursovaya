<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;                
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request){
    $data = $request->validate([
    'login'=>'required|min:6|regex:/^[A-za-z0-9]+$/|unique:users,login',
    'password'=>'required|min:8',
    'phone'=>'required',
    'email'=>'required|email'
    ],

    [
    'required'=>'Поле обязательно для заполнения',
    'login.min'=>'Логин должен быть не менее 6 символов',
    'login.regex'=>'Можно использовать только латиницу и цифры',
    'login.unique'=>'Этот логин уже занят',
    'password.min'=>'Пароль должен быть не менее 8 символов',
    'email.email'=>'Некорректный email'
    ]
    );

    User::create($data);
    return redirect('/login');
    }

    public function login(Request $request){
    $data = $request->validate([
    'login'=>'required|string',
    'password'=>'required|string',
    ],

    [
    'required'=>'Поле обязательно для заполнения',
    ]
    );
    
    if (Auth::attempt($data)){
    $request->session()->regenerate();
    
    if(Auth::User()->role=='admin'){
        return redirect ('/Admin');
    }
    return redirect('/Booking');
    }
     return back()
    ->withErrors(['login'=>'Неверный логин или пароль']);
    }
}
