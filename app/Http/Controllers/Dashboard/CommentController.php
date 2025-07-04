<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\User\CommentRequest;
use App\Models\Comment;
use App\Models\Place;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Summary of store
     * @param \App\Http\Requests\Dashboard\User\CommentRequest $request
     * @param int $id
     * @return mixed|RedirectResponse
     */
    public function store(CommentRequest $request, int $id): RedirectResponse
    {
        $user = Auth::user();

        $place = Place::findOrFail($id);

        Comment::create([
            'user_id' => $user->id,
            'place_id' => $place->id,
            'content' => $request->content,
        ]);

        return redirect()->route('places.show', ['place' => $place->id]);
    }
}
