<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof \Spatie\Permission\Exceptions\UnauthorizedException) {
            if($request->ajax()){
                $response = new JsonResponse([
                    'success' => false,
                    'message' => 'Validation error',
                    'errors' => $exception->getMessage(),
                ], 422);

                throw new HttpResponseException($response);
            }
            return redirect()->back()
            ->withErrors(['AccessDenied' => 'Access Denied']);
        }

        return parent::render($request, $exception);
    }
}
