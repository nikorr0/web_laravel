<?php

namespace App\Http\Controllers;

use App\Events\FriendshipCreated;
use App\Models\User;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function addFriend(User $user)
    {
        $currentUser = auth()->user();
        if (!$currentUser->friends->contains($user)) {
            $currentUser->friends()->attach($user->id);
            event(new FriendshipCreated($currentUser, $user));
        }
        return back()->with('success', 'The user has been added as a friend.');
    }
    public function removeFriend(User $user)
    {
        auth()->user()->friends()->detach($user->id);
        return back()->with('success', 'The user has been removed from friends.');
    }
}
