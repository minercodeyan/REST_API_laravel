<?php

namespace App\Exceptions;


namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;

class NotFoundException extends Exception
{

    public function render($request): Response
    {
        $status = 404;
        $error = $this->getMessage() . " not found";
        $help = "Contact the sales team to verify";

        return response([
            "success"=>false,
            "message" => $error,
            "help" => $help], $status);
    }
}
