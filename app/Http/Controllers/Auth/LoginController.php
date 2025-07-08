<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Summary of showForm
     * @return View
     */
    public function showForm(): View
    {
        return view('auth.login');
    }

    /**
     * Summary of login
     * @param \App\Http\Requests\Auth\LoginRequest $request
     * @return RedirectResponse
     */
    public function login(LoginRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if (Auth::attempt($data)) {
            return redirect()->route('places.index');
        }

        return redirect()->back();
    }

    /**
     * Summary of logout
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect()->route('login.form');
    }

}
