<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use \Illuminate\Http\JsonResponse;

class BaseController extends Controller
{

    public function sendResponse($result, $message): JsonResponse
    {
        $response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];
        return response()->json($response, 200);
    }

}
