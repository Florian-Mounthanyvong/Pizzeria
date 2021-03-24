<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
class IsCook
{
    public function handle(Request $request, Closure $next)
    {
        if($request->user()->isCook()) {
            return $next($request);
        }
        abort(403,'Vous n êtes pas pizzaiolo');
    }
}
