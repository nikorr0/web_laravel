<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'           => $this->id,
            'name'         => $this->name,
            'email'        => $this->email,
            'is_admin'     => $this->is_admin,
            'cardsCount'   => $this->when(isset($this->cards_count), $this->cards_count),
            'friendsCount' => $this->when(isset($this->friends_count), $this->friends_count),
            'createdAt'    => $this->created_at->toIso8601String(),

            // при запросе /api/users/{id} вернётся детализация:
            'cards'        => CardResource::collection(
                                $this->whenLoaded('cards')
                             ),
            'friends'      => UserFriendResource::collection(
                                $this->whenLoaded('friends')
                             ),
        ];
    }
}
