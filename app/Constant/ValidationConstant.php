<?php

namespace App\Constant;

class ValidationConstant
{
    public static function getStudentValidationForSave(): array
    {
        return [
            'firstname' => 'required',
            'lastname' => 'required',
            'parent'=>'required',
            'number'=>'required'
        ];
    }

    public static function getStudentValidationForUpdate(): array
    {
        return  [
            'firstname' => 'required',
            'lastname' => 'required'
        ];
    }

    public static function getUserValidation(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed'
        ];
    }
}
