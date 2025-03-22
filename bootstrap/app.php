<?php

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
        //
        $middleware->alias(['ci' => \App\Http\Middleware\CiMiddleware::class,
                            'admin' => \App\Http\Middleware\AdminMiddleware::class,
                            'user' => \App\Http\Middleware\UserMiddleware::class,
                            'call' => \App\Http\Middleware\CallMiddleware::class]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
