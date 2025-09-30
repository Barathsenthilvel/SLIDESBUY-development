<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        //
    }


public function render($request, Throwable $exception)
{
    if ($exception instanceof \Illuminate\Session\TokenMismatchException) {
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => false,
                'message' => 'Session expired. Please refresh the page and try again.',
                'error_type' => 'csrf_mismatch'
            ], 419);
        }

        return redirect()->back()->with('error', 'Your session has expired. Please refresh the page and try again.');
    }

    return parent::render($request, $exception);
}


}
