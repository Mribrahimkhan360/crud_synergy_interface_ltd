<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $authService;

    public function __construct(UserService $authService)
    {
        $this->authService = $authService;
    }

    public function showRegister()
    {
        return view('auth.register');
    }
    public function register(UserRequest $request)
    {
        $this->authService->register($request->all());
        return redirect('/login');
    }

    public function showLogin()
    {
        if ($this->authService->isAuthenticated())
        {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

    public function login(UserRequest $request)
    {
        if ($this->authService->login($request->only('email','password')))
        {
            return redirect('/dashboard');
        }
        return  back()->withErrors(['email'=>'Invalid credentials']);
    }

    public function dashboard()
    {
        if ($this->authService->isAuthenticated()){
            return view('dashboard');
        }
        return view('auth.login');
    }

    public function logout()
    {
        $this->authService->logout();
        return redirect('/login');
    }
}
