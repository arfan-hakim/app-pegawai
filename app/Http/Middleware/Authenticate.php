<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo(Request $request)
    {
        // Jika request AJAX / expectsJson, jangan redirect (biarkan response 401)
        if (! $request->expectsJson()) {
            // Ubah route('login') sesuai route login yang kamu pakai
            return route('login.form');
        }

        return null;
    }
}
