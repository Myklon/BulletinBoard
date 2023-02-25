<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class FileService
{
    public function upload($file)
    {
        return Storage::put('public', $file);
    }

    public function download($path)
    {
        return Storage::get($path);
    }
}
