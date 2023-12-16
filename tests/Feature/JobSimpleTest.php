<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class JobSimpleTest extends TestCase
{
use App\Utils\Helpers\TestHelper;

    // note: php artisan test --filter UserTest::test_create

    private string $model_name = 'user';
    private string $model = model::class;
    

    public function test_index()
    {
        $response = $this
            ->actingAs(TestHelper::user('user'), 'api')
            ->get("/api/$this->model_name/index" . '?per_page=' . TestHelper::perPage())
            ->assertStatus(200);

        TestHelper::testDump($response, 'index');
    }



    public function test_show()
    {
        $response = $this
            ->actingAs(TestHelper::user('user'), 'api')
            ->get("/api/$this->model_name/" . $this->model::inRandomOrder()->first()->id)
            ->assertStatus(200);

        TestHelper::testDump($response, 'show');
    }



    public function test_delete()
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
    }    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
