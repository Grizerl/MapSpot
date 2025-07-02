<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class RegisterController extends Controller
{
    /**
     * Summary of showForm
     * @return View
     */
    public function showForm(): View
    {
        return view('auth.register');
    }

    /**
     * Summary of register
     * @param \App\Http\Requests\Auth\RegisterRequest $request
     * @return mixed|RedirectResponse
     */
    public function register(RegisterRequest $request): RedirectResponse
    {
        User::create($request->validated());
        return redirect()->route('login.form');
    }
}
