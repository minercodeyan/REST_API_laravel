<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;

class BadCredException extends Exception
{
    public function render($request): Response
    {
        $status = 401;
        $error = $this->getMessage();
        $help = "Contact the sales team to verify";

        return response([
            "success"=>false,
            "massage" => $error,
            "help" => $help], $status);
    }
}
