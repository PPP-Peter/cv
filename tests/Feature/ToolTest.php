<?php

namespace Tests\Feature;

use App\Utils\Helpers\TestHelper;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ToolTest extends TestCase
{

    // note: php artisan test --filter ToolTest::test_index

    private string $model_name = 'tool';
    private string $model = \App\Models\Tool::class;


    public function test_index()
    {
        $response = $this
            ->get("/api/v1/$this->model_name/index" . '?per_page=' . TestHelper::perPage())
            ->assertStatus(200);

        TestHelper::testDump($response, 'index');
    }



    public function test_show()
    {
        $response = $this
            ->get("/api/v1/$this->model_name/" . $this->model::inRandomOrder()->first()->id)
            ->assertStatus(200);

        TestHelper::testDump($response, 'show');
    }



 /*   public function test_delete()
    {
        \Illuminate\Support\Facades\DB::beginTransaction();

        $response = $this
            ->actingAs(TestHelper::user('user'), 'api')
            ->get("/api/$this->model_name/" . $this->model::inRandomOrder()->first()->id)
            ->assertStatus(200);

        \Illuminate\Support\Facades\DB::rollBack();

        TestHelper::testDump($response, 'delete');

    }


    public function test_update()
    {
        $user_factory = $this->model::factory()->make()->toArray();

        \App\Utils\Helpers\TestHelper::ExportForPostman($user_factory);

        $user_id =  $this->model::inRandomOrder()->first()->id;

        $response = $this
            ->actingAs(TestHelper::user('user'), 'api')
            ->post("api/$this->model_name/$user_id", $user_factory)
            ->assertStatus(201);

        TestHelper::testDump($response, 'create');
    }



    public function test_create()
    {
        $user_factory = $this->model::factory()->make()->toArray();

        \App\Utils\Helpers\TestHelper::ExportForPostman($user_factory);

        \Illuminate\Support\Facades\DB::beginTransaction();

        $response = $this
            ->actingAs(TestHelper::user('user'), 'api')
            ->post("api/$this->model_name/", $user_factory, ['Content-Type' => 'multipart/form-data', 'Accept' => 'application/json',])
            ->assertStatus(201);

        \Illuminate\Support\Facades\DB::rollBack();

        TestHelper::testDump($response, 'create');
    } */


}
