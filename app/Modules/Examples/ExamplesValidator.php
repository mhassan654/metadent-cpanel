<?php

namespace App\Modules\Examples;

use InvalidArgumentException;

class ExamplesValidator
{
    public function validateUpdate(array $data): void
    {
        $validator = validator($data, [
            "name" => "required|string",
            "email" => "required|string|email",
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException(json_encode($validator->errors()->all()));
        }
    }

}
