<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Place;
use App\Models\User;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $userCount = User::where('role', 'user')->count();
        $placesCount = Place::count();
        return view('dashboard.admin.home', compact('userCount', 'placesCount'));
    }
}
