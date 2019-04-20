<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GameResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return array_merge(parent::toArray($request), [
      'game_pieces' => $this->gamePieces,
      'spaces'      => SpaceResource::collection($this->spaces),
      'cards'       => CardResource::collection($this->cards),
    ]);
    }
}
