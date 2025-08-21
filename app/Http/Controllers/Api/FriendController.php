<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    /** POST /api/friends/{user}  – добавить в друзья */
    public function store(Request $request, $id)
    {
        $auth = $request->user();
        $user = User::find($id);
        if (! $user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        if ($auth->id === $user->id) {
            return response()->json(['message' => 'Cannot add yourself'], 400);
        }

        $auth->friends()->syncWithoutDetaching([$user->id]);
        // $user->friends()->syncWithoutDetaching([$auth->id]);

        return response()->json(['message'=>'Friend added','friend_id'=>$user->id], 201);
    }

    public function destroy(Request $request, $id)
    {
        $auth = $request->user();
        $user = User::find($id);
        if (! $user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        if ($auth->id === $user->id) {
            return response()->json(['message' => 'Cannot remove yourself'], 400);
        }

        $auth->friends()->detach($user->id);
        // $user->friends()->detach($auth->id);

        return response()->json(['message'=>'Friend removed','friend_id'=>$user->id], 200);
    }
}
