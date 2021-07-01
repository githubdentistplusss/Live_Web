<?php

namespace App\Helpers;

use Symfony\Component\HttpFoundation\File\File;

class UploadedTempFile extends File
{
    public function __construct($base64Content)
    {
        $fileData = explode(';base64,', $base64Content);
        $extension = explode('/', $fileData[0], 2)[1];
        $fileData = $fileData[1];
        $fileData = str_replace(' ', '+', $fileData);
        $fileData = base64_decode($fileData);
        $filePath = tempnam(sys_get_temp_dir(), 'api_uploaded_file');
        $filePath = $filePath . '.' . $extension;

        file_put_contents($filePath, $fileData);

        parent::__construct($filePath, true);
    }
}