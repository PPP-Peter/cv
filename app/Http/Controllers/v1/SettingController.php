<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Wame\ApiResponse\Helpers\ApiResponse;


/**
 * @group Setting
 */
class SettingController extends Controller
{
    /**
     * GET Setting index
     *
     * @bodyParam page int Pagination page Example: 1
     * @bodyParam per_page int Pagination per page Example: 20
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $data = [
                'address' => nova_get_setting('address', 'Hervartov 68'),
                'phone' => nova_get_setting('phone', '0948098889'),
                'email' => nova_get_setting('email', 'p.petermanik@gmail.com'),
            ];

            return ApiResponse::data($data)->code('1')->response();
        } catch (\Exception $e) {
            return ApiResponse::code('9')->message($e->getMessage())->response(500);
        }
    }

}
