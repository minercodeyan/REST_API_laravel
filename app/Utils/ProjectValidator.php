<?php

namespace App\Utils;

use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

class ProjectValidator
{
    public function validateRequest($model,$validationArray): void
    {
        $validated = Validator::make($model, $validationArray);
        if ($validated->fails()) {
            throw new ValidationException($validated);
        }
    }
}
