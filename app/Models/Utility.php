<?php

namespace App\Models;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Utility
{
    public static function uploadFile(UploadedFile $file, $storage_disk = 'public', $storage_path = 'uploads')
    {
        // Validate that the file is an image (you can adjust the MIME types as needed)
        if (true) {
            // Generate a unique file name
            $fileName = Str::random(20) . '.' . $file->getClientOriginalExtension();

            // Store the file in the specified disk and path
            $path = $file->storeAs($storage_path, $fileName, $storage_disk);

            // Generate a public URL to access the file
            // $url = Storage::disk($storage_disk)->url($storage_path . '/' . $fileName);

            return [
                'flag' => 1,
                'msg' => 'File uploaded successfully',
                'url' => $path,
            ];
        }
    }
}
