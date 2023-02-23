<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;

class HashService
{
    public function hash(string $value)
    {
        return Hash::make($value);
    }

    public function validate(string $value, string  $hash)
    {
        return Hash::check($value, $hash);
    }
}
