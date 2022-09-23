<?php

namespace App\Http\Controllers;

use App\Exceptions\BadCredException;
use App\Http\Controllers\api\BaseController;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends BaseController
{
    protected UserService $userService;

    /**
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }


    public function register(Request $request): JsonResponse
    {

        return $this->sendResponse($this->userService->createUser($request),
                "user created successfully");
    }

    /**
     * @throws BadCredException
     */
    public function login(Request $request): JsonResponse
    {
        return $this->sendResponse($this->userService->authUser($request),"hello user");
    }

    public function logout(Request $request): JsonResponse
    {
        $this->userService->logoutUser();
        return $this->sendResponse([],"logout");
    }
}
