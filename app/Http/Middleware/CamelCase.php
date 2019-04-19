<?php

namespace App\Http\Middleware;

use Closure;

class CamelCase
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle($request, Closure $next)
  {
    $response = $next($request);

    $response->setData(
      collect($response->getData())->camelizeKeys()
    );

    return $response;
  }
}
