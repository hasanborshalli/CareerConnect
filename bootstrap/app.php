<?php

use App\Http\Middleware\checkUserRole;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'is_company'=>checkUserRole::class.':company',
            'is_seeker'=>checkUserRole::class.':seeker',

        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();