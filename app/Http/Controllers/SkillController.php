<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\SkillResource;
use App\Models\Skill;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Wame\ApiResponse\Helpers\ApiResponse;
use Wame\LaravelCommands\Utils\Validator;

/**
 * @group Skill
 */
class SkillController extends Controller
{
    /**
     * GET Skill index
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
            $validator = Validator::code()->validate($request->all(), [
                'page' => 'integer|min:1',
                'per_page' => 'integer|min:1'
            ]);
            if ($validator) return $validator;

            $perPage = $request->get('per_page', config('wame-commands.per_page', 20));

            $data = Skill::paginate($perPage);

            return ApiResponse::collection($data, SkillResource::class)->code()->response();
        } catch (\Exception $e) {
            return ApiResponse::code()->message($e->getMessage())->response(500);
        }
    }

    /**
     * POST Skill store
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $validator = Validator::code()->validate($request->all(), [

            ]);
            if ($validator) return $validator;

            DB::beginTransaction();

            $entity = Skill::create([

            ]);

            DB::commit();

            return ApiResponse::data(SkillResource::make($entity))->code()->response(201);
        } catch (\Exception $e) {
            DB::rollBack();
            return ApiResponse::code()->message($e->getMessage())->response(500);
        }
    }

    /**
     * GET Skill show
     *
     * @urlParam id ulid required Skill id Example: 01gsa40bvafp2tewxh67bbphw2
     *
     * @param string $id
     * @return JsonResponse
     */
    public function show(string $id): JsonResponse
    {
        try {
            $validator = Validator::code()->validate(['id' => $id], [
                'id' => 'ulid|required|exists:skills,id,deleted_at,NULL',
            ]);
            if ($validator) return $validator;

            $entity = Skill::find($id);

            return ApiResponse::data(SkillResource::make($entity))->code()->response();
        } catch (\Exception $e) {
            return ApiResponse::code()->message($e->getMessage())->response(500);
        }
    }

    /**
     * PUT Skill update
     *
     * @urlParam id ulid required Skill id Example: 01gsa40bvafp2tewxh67bbphw2
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

            $validator = Validator::code()->validate($validate, [
                'id' => 'ulid|required|exists:skills,id,deleted_at,NULL',
            ]);
            if ($validator) return $validator;

            $entity = Skill::find($id);

            DB::beginTransaction();

            $entity->update([

            ]);

            DB::commit();

            return ApiResponse::data(SkillResource::make($entity))->code()->response();
        } catch (\Exception $e) {
            DB::rollBack();
            return ApiResponse::code()->message($e->getMessage())->response(500);
        }
    }

    /**
     * DELETE Skill delete
     *
     * @urlParam id ulid required Skill id Example: 01gsa40bvafp2tewxh67bbphw2
     *
     * @param string $id
     * @return JsonResponse
     */
    public function delete(string $id): JsonResponse
    {
        try {
            $validator = Validator::code()->validate(['id' => $id], [
                'id' => 'ulid|required|exists:skills,id,deleted_at,NULL',
            ]);
            if ($validator) return $validator;

            DB::beginTransaction();

            $entity = Skill::find($id);
            $entity->delete();

            DB::commit();

            return ApiResponse::data(SkillResource::make($entity))->code()->response();
        } catch (\Exception $e) {
            DB::rollBack();
            return ApiResponse::code()->message($e->getMessage())->response(500);
        }
    }
}
