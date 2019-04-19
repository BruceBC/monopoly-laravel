<?php

namespace App\Http\Resources;

use Illuminate\Support\Str;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\ConditionallyLoadsAttributes;

class MergeResource
{
    use ConditionallyLoadsAttributes;

    /**
     * @var JsonResource
     */
    protected $instance;

    /**
     * @var array
     */
    protected $relations;

    /**
     * @var array
     */
    protected $resources;

    /**
     * MergeResource constructor.
     *
     * @param JsonResource $instance
     * @param array $relations
     * @param array $resources
     */
    public function __construct(
    JsonResource $instance,
    array $relations,
    $resources = []
  ) {
        $this->instance  = $instance;
        $this->relations = $relations;
        $this->resources = $resources;
    }

    /**
     * Conditionally merges an array of snake cased relationships by calling.
     *
     * a camel cased relationship attached to an eloquent object.
     *
     * @return array
     */
    public function handle()
    {
        return collect($this->relations)
      ->map(function ($relation) {
          $funcName = Str::camel($relation);

          return $this->mergeWhen($this->instance->$funcName, [
          $relation => array_key_exists($relation, $this->resources)
            ? $this->resources[$relation]->make($this->instance->$funcName)
            : $this->instance->$funcName,
        ]);
      })
      ->toArray();
    }
}
