<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Database\QueryException;
use Throwable;
use ErrorException;  // Import ErrorException for PHP errors like undefined variables
use Illuminate\Validation\ValidationException;

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

    /**
     * Render an exception into an HTTP response.
     */
    // public function render($request, Throwable $exception)
    // {
    //     // Check if the exception is a SQL error (QueryException)
    //     if ($exception instanceof QueryException) {
    //         \Log::error('SQL Error: ' . $exception->getMessage());
    //         return response()->view('sql_error', [], 500); // 500 for internal server error
    //     }

    //     // Check if the exception is a general PHP error (e.g., undefined variable)
    //     if ($exception instanceof ErrorException) {
    //         \Log::error('PHP Error: ' . $exception->getMessage());
    //         return response()->view('sql_error', ['message' => $exception->getMessage()], 500);
    //     }

    //     // For any other exceptions, use the default exception handler
    //     return parent::render($request, $exception);
    // }
    public function render($request, Throwable $exception)
{
    // Handle SQL errors (QueryException)
    if ($exception instanceof \Illuminate\Database\QueryException) {
        \Log::error('SQL Error: ' . $exception->getMessage());
        return response()->view('sql_error', [], 500); // 500 for internal server error
    }

    // Handle general PHP errors (ErrorException)
    if ($exception instanceof \ErrorException) {
        \Log::error('PHP Error: ' . $exception->getMessage());
        return response()->view('sql_error', ['message' => $exception->getMessage()], 500);
    }

    // Handle validation errors (ValidationException)
    if ($exception instanceof ValidationException) {
        // Return validation errors as a JSON response (for APIs) or redirect back with errors
        if ($request->expectsJson()) {
            return response()->json(['error' => $exception->errors()], 422);
        }

        return redirect()->back()
            ->withErrors($exception->errors())
            ->withInput(); // Keeps input values after validation errors
    }

    // For any other exceptions, use the default exception handler
    return parent::render($request, $exception);
}
}
