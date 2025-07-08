<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\User\PlaceRequest;
use App\Models\Place;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    /**
     * Summary of index
     */
    public function index(): View
    {
        $user = Auth::user();

        $places = $user->places()->select('id', 'title', 'lat', 'lng')->get();

        return view('dashboard.map', compact('places'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('dashboard.places.create');
    }

    /**
     * Summary of Image
     * @param Request $request
     * @return string|null
     */
    private function storeImage(Request $request): ?string
    {
        if ($request->hasFile('path')) {
            return $request->file('path')->store('places', 'public');
        }

        return null;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PlaceRequest $request): RedirectResponse
    {
        $user = Auth::user();

        $image = $this->storeImage($request);

        Place::create([
            'user_id' => $user->id,
            'title' => $request->title,
            'description' => $request->description,
            'path' => $image,
            'lat' => $request->lat,
            'lng' => $request->lng,
        ]);

        return redirect()->route('places.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): View
    {
        $places = Place::findOrFail($id);

        $comments = $places->comments()->with('user')->paginate(3);

        return view('dashboard.places.show', compact('places', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id): View
    {
        $place = Place::findOrFail($id);

        return view('dashboard.places.edit', compact('place'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PlaceRequest $request, int $id): RedirectResponse
    {
        $place = Place::findOrFail($id);

        $data = $request->only(['title', 'description', 'lat', 'lng']);

        if ($image = $this->storeImage($request)) {
            if ($place->path && Storage::disk('public')->exists($place->path)) {
                Storage::disk('public')->delete($place->path);
            }

            $data['path'] = $image;

        } else {
            $data['path'] = $place->path;
        }

        $place->update($data);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Place $place): RedirectResponse
    {
        $place->delete();

        if ($place->path && Storage::disk('public')->exists($place->path)) {
            Storage::disk('public')->delete($place->path);
        }

        return redirect()->route('places.index');
    }
}
