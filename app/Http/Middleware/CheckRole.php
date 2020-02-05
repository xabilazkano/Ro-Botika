<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    public function handle($request, Closure $next){
      if (! $request->user()->hasRole("admin")) {
        return redirect("home");
      }
      return $next($request);
    }
}
