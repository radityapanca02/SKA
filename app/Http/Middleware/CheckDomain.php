<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckDomain
{
    private $allowedDomains = [
        'smkpgri3mlg.jh-beon.cloud',
        'www.smkpgri3mlg.jh-beon.cloud',
        'smkpgri3mlg.web.id',
        'www.smkpgri3mlg.web.id',
        'localhost',
        '127.0.0.1'
    ];

    public function handle(Request $request, Closure $next)
    {
        // Check if current domain is allowed
        if (!in_array($request->getHost(), $this->allowedDomains)) {
            abort(403, 'Domain tidak diizinkan');
        }

        // Set config based on domain
        if (str_contains($request->getHost(), 'smkpgri3mlg.web.id')) {
            config(['app.name' => 'SMK PGRI 3 Malang - Secondary Domain']);
        }

        return $next($request);
    }
}
