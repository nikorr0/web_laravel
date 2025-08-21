<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CardResource;
use Illuminate\Http\Request;
use App\Models\Card;

class FeedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $friendIds = $request->user()->friends()->pluck('users.id');

        // Загружаем карточки друзей с автором и комментариями
        $cards = Card::with(['user', 'comments.user'])
                     ->whereIn('user_id', $friendIds)
                     ->latest()
                     ->paginate(20);

        return CardResource::collection($cards);
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
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
