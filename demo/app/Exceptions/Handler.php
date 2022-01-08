<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use App\Exceptions\InvalidErrorException;
use Illuminate\Database\QueryException;

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
        $this->reportable(function (Throwable $e) {
            //error_log(get_class($e));
            if ($e instanceof QueryException) {
                //return false;
            }
        });



        $this->renderable(function (Throwable $e) {
            error_log(get_class($e));
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);

            //If you want different message for different exception, then use it
            /* if ($e instanceof QueryException) {
                error_log('Query Exception');
                return response()->json(['status' => 'error', 'message' => 'Something went wrong'], 500);
            } */
        });


        $this->renderable(function (InvalidErrorException $ivee) {
            error_log('Exception Handling =>');
        });
    }
}
