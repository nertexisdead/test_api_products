<?php

use App\Enums\Errors;
use Illuminate\Foundation\Application;
use App\Exceptions\ApiDefaultException;
use App\Http\Resources\ErrorResource;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (ApiDefaultException $e, Request $request) {
            $errors = $e->errors
                ->map(function ($error) {
                    return new ErrorResource($error);
                })
                ->toArray()
            ;
            return response()->json([
                'success' => false,
                'errors' => $errors,
            ]);
        });
        $exceptions->render(function (HttpException $e, Request $request) {
            return response()->json([
                'success' => false,
                'errors' => [
                    0 => new ErrorResource(
                        Errors::NOT_FOUND
                    ),
                ],
            ], 404);
        });
        $exceptions->render(function (Throwable $e, Request $request) {
            Log::debug($e);
            return response()->json([
                'success' => false,
                'errors' => [
                    0 => new ErrorResource(
                        Errors::INTERNAL_SERVER_ERROR
                    ),
                ],
            ], 500);
        });
    })->create();
