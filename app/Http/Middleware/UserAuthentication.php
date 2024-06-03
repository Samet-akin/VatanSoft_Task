<?php

namespace App\Http\Middleware;

use App\Models\LogModel;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class UserAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->header("Authorization")!='$xv1623tty')
        {
            LogModel::create(['ip'=>$request->ip()]);
            $cacheKey = 'errorcount' . $request->ip();
            $errorCount = Cache::get($cacheKey, 0);
            $errorCount++;
            if ($errorCount > 30)
            {
                return response()->json(['error'=>"istek limiti aşıldı"], 429);
            }
            Cache::put($cacheKey, $errorCount, now()->addMinutes(1));
            return response()->json(['error' => 'Geçersiz key.'], 404);
        }
        return $next($request);
    }
}
