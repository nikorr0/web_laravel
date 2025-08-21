<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CardResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    
    public function toArray(Request $request): array
    {
        return [
            'id'        => $this->id,
            'name'   => $this->name,
            'short_text'     => $this->short_text,
            'long_text'      => $this->long_text,
            'image_url'  => $this->image_url,
            'author'    => [
                'id'   => $this->user->id,
                'name' => $this->user->name,
            ],
            'comments'  => CommentResource::collection(
                              $this->whenLoaded('comments')
                          ),
            'createdAt' => $this->created_at->toIso8601String(),
        ];
    }
}
