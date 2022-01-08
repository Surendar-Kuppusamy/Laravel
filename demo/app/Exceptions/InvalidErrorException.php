<?php

namespace App\Exceptions;

use Exception;
/* use Illuminate\Http\Request;
use Illuminate\Http\Response; */


class InvalidErrorException extends Exception
{

    public function report() {
        error_log('Custom Report');
    }

    public function render($request) {
        abort(500);
        /* error_log('Custom Exception');
        return response(['status' => 'error', 'message' => 'Something went wrong']); */
    }
}
