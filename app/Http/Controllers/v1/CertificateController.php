<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CertificateResource;
use App\Models\Certificate;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Wame\ApiResponse\Helpers\ApiResponse;
use Wame\LaravelCommands\Utils\Validator;

/**
 * @group Certificate
 */
class CertificateController extends Controller
{
    /**
     * GET Certificate index
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

            $data = Certificate::paginate($perPage);

            return ApiResponse::collection($data, CertificateResource::class)->code('1')->response();
        } catch (\Exception $e) {
            return ApiResponse::code('9')->message($e->getMessage())->response(500);
        }
    }

    /**
     * POST Certificate store
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $validator = Validator::code('0')->validate($request->all(), [

            ]);
            if ($validator) return $validator;

            DB::beginTransaction();

            $entity = Certificate::create([

            ]);

            DB::commit();

            return ApiResponse::data(CertificateResource::make($entity))->code('1')->response(201);
        } catch (\Exception $e) {
            DB::rollBack();
            return ApiResponse::code('9')->message($e->getMessage())->response(500);
        }
    }

    /**
     * GET Certificate show
     *
     * @urlParam id ulid required Certificate id Example: 01gsa40bvafp2tewxh67bbphw2
     *
     * @param string $id
     * @return JsonResponse
     */
    public function show(string $id): JsonResponse
    {
        try {
            $validator = Validator::code('0')->validate(['id' => $id], [
                'id' => 'ulid|required|exists:certificates,id,deleted_at,NULL',
            ]);
            if ($validator) return $validator;

            $entity = Certificate::find($id);

            return ApiResponse::data(CertificateResource::make($entity))->code('1')->response();
        } catch (\Exception $e) {
            return ApiResponse::code('9')->message($e->getMessage())->response(500);
        }
    }

    /**
     * PUT Certificate update
     *
     * @urlParam id ulid required Certificate id Example: 01gsa40bvafp2tewxh67bbphw2
     *
     * @param string $id
     * @param Request $request
     * @return JsonResponse
     */
    public function update(string $id, Request $request): JsonResponse
    {
        try {
            $validate = $request->all();
            $validate['id'] = $id;

            $validator = Validator::code('0')->validate($validate, [
                'id' => 'ulid|required|exists:certificates,id,deleted_at,NULL',
            ]);
            if ($validator) return $validator;

            $entity = Certificate::find($id);

            DB::beginTransaction();

            $entity->update([

            ]);

            DB::commit();

            return ApiResponse::data(CertificateResource::make($entity))->code('1')->response();
        } catch (\Exception $e) {
            DB::rollBack();
            return ApiResponse::code('9')->message($e->getMessage())->response(500);
        }
    }

    /**
     * DELETE Certificate delete
     *
     * @urlParam id ulid required Certificate id Example: 01gsa40bvafp2tewxh67bbphw2
     *
     * @param string $id
     * @return JsonResponse
     */
    public function delete(string $id): JsonResponse
    {
        try {
            $validator = Validator::code('0')->validate(['id' => $id], [
                'id' => 'ulid|required|exists:certificates,id,deleted_at,NULL',
            ]);
            if ($validator) return $validator;

            DB::beginTransaction();

            $entity = Certificate::find($id);
            $entity->delete();

            DB::commit();

            return ApiResponse::data(CertificateResource::make($entity))->code('1')->response();
        } catch (\Exception $e) {
            DB::rollBack();
            return ApiResponse::code('9')->message($e->getMessage())->response(500);
        }
    }
}
