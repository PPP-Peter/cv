<?php

namespace App\Utils\Helpers;

class ImageHelper
{
    public static function getParams($url)
    {
        // $size = filesize('storage/' . $url);
        $fileName = explode('/', $url)[1];
        $name = explode('.', $fileName)[0];

        return [
            //  'size' => $size,
            'file_name' => $fileName,
            'name' => $name,
        ];
    }
}
