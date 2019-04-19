<?php

namespace App\Providers;

use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class CollectionMacroServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
      /*
       * Recursively updates key names to camel case.
       */
      Collection::macro('camelizeKeys', function() {
        return $this->map(function ($item, $key) {
          return [
            Str::camel($key) =>
              is_array($item) || is_object($item)
                ? collect($item)->camelizeKeys()
                : $item,
          ];
        })
          ->reduce(function ($carry, $item) {
            return array_merge($carry, $item);
          }, []);
      });
    }
}
