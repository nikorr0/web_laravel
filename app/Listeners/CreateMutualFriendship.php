<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateMutualFriendship
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(FriendshipCreated $event)
    {
        $user = $event->user;
        $friend = $event->friend;
        
        if (!$friend->friends->contains($user)) {
            $friend->friends()->attach($user->id);
        }
    }
}
