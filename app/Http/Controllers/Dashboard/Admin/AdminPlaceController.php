<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Admin\AdminPlaceRequest;
use App\Models\Place;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminPlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $places = Place::whereHas('user', function ($query) {
            $query->where('role', 'user');
        })->paginate(15);

        return view('dashboard.admin.places.index', compact('places'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): View
    {
        $places = Place::findOrFail($id);

        $comments = $places->comments()->with('user')->paginate(5);

        return view('dashboard.admin.places.show', compact('places', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id): View
    {
        $places = Place::findOrFail($id);

        return view('dashboard.admin.places.edit', compact('places'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminPlaceRequest $request, int $id): RedirectResponse
    {
        $place = Place::findOrFail($id);

        $data = $request->only(['title', 'description', 'lat', 'lng']);

        if ($request->hasFile('path')) 
        {
            if ($place->path && Storage::disk('public')->exists($place->path)) {
                Storage::disk('public')->delete($place->path);
            }

            $image = $request->file('path')->store('places', 'public');

            $data['path'] = $image;
        } 
        else {
            $data['path'] = $place->path;
        }

        $place->update($data);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): RedirectResponse
    {
        $place = Place::findOrFail($id);

        if ($place->path && Storage::disk('public')->exists($place->path)) {
            Storage::disk('public')->delete($place->path);
        }

        $place->delete(); 

        return redirect()->back();
    }
}
