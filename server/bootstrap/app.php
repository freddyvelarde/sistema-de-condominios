<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

// $app->configure('jwt');
// // Uncomment this line
// $app->register(App\Providers\AuthServiceProvider::class);
//
//
// // Add this line
// $app->register(Tymon\JWTAuth\Providers\LumenServiceProvider::class);
// $app->routeMiddleware([
//     'auth' => App\Http\Middleware\Authenticate::class,
// ]);

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
