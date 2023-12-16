<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\SkillResource;
use App\Models\Certificate;
use App\Models\Job;
use App\Models\Skill;
use App\Models\Tool;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Wame\ApiResponse\Helpers\ApiResponse;
use Wame\LaravelCommands\Utils\Validator;

/**
 * @group Profil
 */
class ProfilController extends Controller
{
    /**
     * GET Profil index
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
            $validator = Validator::code('0')->validate($request->all(), [
                'page' => 'integer|min:1',
                'per_page' => 'integer|min:1'
            ]);
            if ($validator) return $validator;

            $perPage = $request->get('per_page', config('wame-commands.per_page', 20));

            $data = [
                [
                    'jobs' => Job::all()->pluck('title'),
                    'favorite_tools' => Tool::all()->pluck('title'),
                    'certificates' => Certificate::all()->pluck('title'),
                    'skills' => Skill::select('title', 'description')->get(),
                ]
            ];

            return ApiResponse::data($data)->code('1')->response();
        } catch (\Exception $e) {
            return ApiResponse::code('9')->message($e->getMessage())->response(500);
        }
    }


    /**
     * GET Profil show
     *
     * @urlParam id ulid required Profil id Example: 01gsa40bvafp2tewxh67bbphw2
     *
     * @param string $id
     * @return JsonResponse
     */
//    public function show(string $id): JsonResponse
//    {
//        try {
//            $validator = Validator::code('0')->validate(['id' => $id], [
//                'id' => 'ulid|required|exists:profils,id,deleted_at,NULL',
//            ]);
//            if ($validator) return $validator;
//
//            $entity = Profil::find($id);
//
//            return ApiResponse::data(ProfilResource::make($entity))->code('1')->response();
//        } catch (\Exception $e) {
//            return ApiResponse::code('9')->message($e->getMessage())->response(500);
//        }
//    }

}
