<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CardResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array
   */
  public function toArray($request)
  {
    $relations = [
      'payment_card',
      'collection_card',
      'collect_per_player_card',
      'pay_per_player_card',
      'repair_card',
      'retreat_card',
      'advance_go_card',
      'advance_street_card',
      'advance_railroad_card',
      'advance_utility_card',
    ];

    return array_merge(
      parent::toArray($request),
      (new MergeResource($this, $relations))->handle()
    );
  }
}
