<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SpaceResource extends JsonResource
{
  protected $relations = [
    'go_space',
    'jail_space',
    'parking_space',
    'tax_space',
    'deed_space',
  ];

  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array
   */
  public function toArray($request)
  {
    $resources = [
      'deed_space' => new ChildResource(DeedResource::class, false),
    ];

    return array_merge(
      parent::toArray($request),
      (new MergeResource($this, $this->relations, $resources))->handle()
    );
  }
}
