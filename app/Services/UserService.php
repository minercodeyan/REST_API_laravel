<?php

namespace App\Services;

use App\Constants\ValidationConstant;
use App\Exceptions\BadCredException;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function createUser($request): array
    {
        $fields = $request->validate(ValidationConstant::getUserValidation());
        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);
        $token = $user->createToken('myapptoken')->plainTextToken;
        return [
            'user' => $user,
            'token' => $token
        ];

    }

    public function authUser($request): array
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);
        // Check email
        $user = User::where('email', $fields['email'])->first();
        // Check password
        if(!$user || !Hash::check($fields['password'], $user->password)) {
            throw new BadCredException('cred exception');
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        return [
            'user' => $user,
            'token' => $token
        ];
    }

    public function logoutUser(): void
    {
        auth()->user()->tokens()->delete();
    }
}
