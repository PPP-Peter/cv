<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\JobResource;
use App\Models\Job;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Wame\ApiResponse\Helpers\ApiResponse;
use Wame\LaravelCommands\Utils\Validator;

/**
 * @group Job
 */
class JobController extends Controller
{
    /**
     * GET Job index
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

            $data = Job::select('title', 'description', 'company', 'from', 'to')->paginate($perPage);

            return ApiResponse::collection($data, JobResource::class)->code('1')->response();
        } catch (\Exception $e) {
            return ApiResponse::code('9')->message($e->getMessage())->response(500);
        }
    }

    /**
     * POST Job store
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

            $entity = Job::create([

            ]);

            DB::commit();

            return ApiResponse::data(JobResource::make($entity))->code('1')->response(201);
        } catch (\Exception $e) {
            DB::rollBack();
            return ApiResponse::code('9')->message($e->getMessage())->response(500);
        }
    }

    /**
     * GET Job show
     *
     * @urlParam id ulid required Job id Example: 01gsa40bvafp2tewxh67bbphw2
     *
     * @param string $id
     * @return JsonResponse
     */
    public function show(string $id): JsonResponse
    {
        try {
            $validator = Validator::code('0')->validate(['id' => $id], [
                'id' => 'ulid|required|exists:jobs,id,deleted_at,NULL',
            ]);
            if ($validator) return $validator;

            $entity = Job::find($id);

            return ApiResponse::data(JobResource::make($entity))->code('1')->response();
        } catch (\Exception $e) {
            return ApiResponse::code('9')->message($e->getMessage())->response(500);
        }
    }

    /**
     * PUT Job update
     *
     * @urlParam id ulid required Job id Example: 01gsa40bvafp2tewxh67bbphw2
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
                'id' => 'ulid|required|exists:jobs,id,deleted_at,NULL',
            ]);
            if ($validator) return $validator;

            $entity = Job::find($id);

            DB::beginTransaction();

            $entity->update([

            ]);

            DB::commit();

            return ApiResponse::data(JobResource::make($entity))->code('1')->response();
        } catch (\Exception $e) {
            DB::rollBack();
            return ApiResponse::code('9')->message($e->getMessage())->response(500);
        }
    }

    /**
     * DELETE Job delete
     *
     * @urlParam id ulid required Job id Example: 01gsa40bvafp2tewxh67bbphw2
     *
     * @param string $id
     * @return JsonResponse
     */
    public function delete(string $id): JsonResponse
    {
        try {
            $validator = Validator::code('0')->validate(['id' => $id], [
                'id' => 'ulid|required|exists:jobs,id,deleted_at,NULL',
            ]);
            if ($validator) return $validator;

            DB::beginTransaction();

            $entity = Job::find($id);
            $entity->delete();

            DB::commit();

            return ApiResponse::data(JobResource::make($entity))->code('1')->response();
        } catch (\Exception $e) {
            DB::rollBack();
            return ApiResponse::code('9')->message($e->getMessage())->response(500);
        }
    }
}
