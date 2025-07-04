<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class LocationController extends Controller
{
    /**
     * Summary of index
     * @return View
     */
    public function index(): View
    {
        $user = Auth::user();

        $data = $user->places()->paginate(15);

        return view('dashboard.points.index', compact('data'));
    }
}
