<?php

namespace App\Utils\Helpers;

use App\Models\User;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class TestHelper
{
    // pristupujes cez TestHelper::

    public static function loginUser($user_id = 1)
    {
        return env('nologin') ? User::find($user_id) : auth()->user();
    }


    public static function user($user = 'user')
    {
        if ($user == 'random') $user = User::inRandomOrder()->first();
        if ($user == 'user') $user = User::role('user')->inRandomOrder()->first();
        if ($user == 'manager') $user = User::role('manager')->inRandomOrder()->first();
        if ($user == 'admin') $user = User::where('email','test1@wame.sk')->first();
        return $user;
    }


    public static function perPage($per_page = null)
    {
        if (!$per_page) $per_page = rand(1,20);
        return $per_page;
    }


    public static function testDump($response, $method = null)
    {
        if (!$method || $method == 'index') {
            return dump($response['message'] . ' - ' . $response['meta']['total'] . ' vysledkov ');
        }

        if ($method == 'create' || $method == 'store' || $method == 'show') {
            dump($response['message']);
            return dump($response['data']);
        }

        if ( $method == 'delete') {
            dump($response['message']);
           // return dump($response['data']);
        }
    }



    public static function token($token=null)
    {
        if (!$token) $token = '';
        if ($token == 'user') $token = '';
        return $token;
    }


      /**
     * @return UploadedFile
     * @throws \Exception
     */
    public static function getImagesForUpload(): UploadedFile
    {
        $images_path = glob(storage_path('app/testing/photos/*'));
        $images_path_count = count(glob(storage_path('app/testing/photos/*')));
        $random_image = $images_path[rand(0, $images_path_count - 1)];
        // Vytvoríme kópiu
        $copyPath = storage_path('app/testing/photos/') . random_int(1, 9) . basename($random_image);
        File::copy($random_image, $copyPath);
        // Upload
        $uploaded_image = new UploadedFile($random_image, 'photo.jpg', 'jpg', null, true);
        return $uploaded_image;
    }


       /**
     * @param array $data
     * @return array|false|string
     */
    public static function ExportForPostman(array $data): string|array|false
    {
        $myfile = fopen("export_postman.txt", "w");
        $export_postman = file_get_contents('export_postman.txt');
        $export_postman = json_decode($export_postman) ?: [];
        $data = array_merge($export_postman, $data);
        // file_put_contents('export_postman.txt', json_encode($data));
        $json = (json_encode($data));
        $text = str_replace(",", "\n", $json);
        $text = str_replace(['"', "'", '{', '}', ','], '', $text);
        fwrite($myfile, $text);
        dump('Vytvoreny Export pre POSTMANA ');
        system('"C:\Program Files\JetBrains\PhpStorm 2023.1.2\bin\phpstorm64.exe" "export_postman.txt"');
        return $data;
    }


      /**
     * @param $data1
     * @param array $validate_array
     * @return void
     */
    public static function validator_function($data1, array $validate_array, $test): void
    {
        $data = $data1;

        $validator = Validator::make($data, $validate_array);
        if ($validator->fails()) {
            dump($validator->errors());
            dump('❌ ⛔ ⭕ ❌');
            $test->assertTrue(false);
            dd($validator->errors());
        } else {
            $test->assertTrue(true);
        }
    }

}
