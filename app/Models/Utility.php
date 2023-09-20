<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Utility extends Model
{
    public static function uploadFile($request, $key_name, $storage_path = 'app/public/')
    {
        if ($request->hasFile($key_name)) {
            $filename = time() . '_' . $request->file($key_name)->getClientOriginalName();
            $request->file($key_name)->move(storage_path($storage_path), $filename);
            $url = asset($storage_path . $filename);

            $url = str_replace('app/public/', 'storage/', $url);

            $response = [
                'flag' => 1,
                'msg' => 'File uploaded successfully',
                'url' => $url,
            ];
        } else {
            $response = [
                'flag' => 0,
                'msg' => 'No file found in the request',
            ];
        }

        return $response;
    }
}