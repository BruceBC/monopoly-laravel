<?php

namespace App\Http\Resources;

class ChildResource
{
    /**
     * Resource class name, i.e., Resource::class.
     *
     * @var string
     */
    protected $resource;

    /**
     * @var bool
     */
    protected $isCollection;

    public function __construct($resource, $isCollection)
    {
        $this->resource     = $resource;
        $this->isCollection = $isCollection;
    }

    /**
     * Returns a closure to apply a resource to a collection or a model.
     *
     * @param $model
     * @return \Closure
     */
    public function make($model)
    {
        // Make sure it isn't null
        if (! isset($model)) {
            return $model;
        }

        return $this->isCollection
      ? // Apply resource to collection
      $this->resource::collection($model)
      : // Apply resource to model
      new $this->resource($model);
    }
}
