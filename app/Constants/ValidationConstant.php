<?php

namespace App\Constants;

class ValidationConstant
{
    public static function getProductValidationForSave(): array
    {
        return [
            'name' => 'required',
            'measure' => 'required',
            'barcode'=>'required',
            'sellingPrice'=>'required'
        ];
    }

    public static function getProductValidationForUpdate(): array
    {
        return  [
            'name' => 'required',
            'barcode' => 'required'
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
