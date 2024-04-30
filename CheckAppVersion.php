<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAppVersion
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Retrieve the value of the 'X-App-Version' header from the request
        $appVersion = $request->header('X-App-Version');

        // Check if the app version is present and less than '2.0.0'
        if ($appVersion && version_compare($appVersion, '2.0.0', '<')) {
            // Return a JSON response with a message indicating that the user should update the app
            return response()->json([
                'message' => 'Please update your app to the latest version now.',
            ], 403);
        }

        // Continue processing the request by passing it to the next middleware or the route handler
        return $next($request);
    }
}
