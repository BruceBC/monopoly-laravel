<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DeedResource extends JsonResource
{
  protected $relations = ['street_deed', 'railroad_deed', 'utility_deed'];

  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array
   */
  public function toArray($request)
  {
    $resources = [
      'street_deed' => new ChildResource(StreetDeedResource::class, false),
    ];

    return array_merge(
      parent::toArray($request),
      (new MergeResource($this, $this->relations, $resources))->handle()
    );
  }
}
