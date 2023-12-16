<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ToolSimpleTest extends TestCase
{
use App\Utils\Helpers\TestHelper;
    
    // note: php artisan test --filter UserTest::test_create

    public function test_index()
    {
        $response = $this->actingAs(TestHelper::user('user'), 'api')
            ->get("/api/v1/user/index" . '?per_page=' . TestHelper::perPage())
            ->assertStatus(200);

        TestHelper::testDump($response, 'index');
    }



    public function test_show()
    {
        $response = $this->actingAs(TestHelper::user('user'), 'api')
            ->get("/api/v1/user/" . \App\Models\User::inRandomOrder()->first()->id)
            ->assertStatus(200);

        TestHelper::testDump($response, 'show');
    }



    public function test_delete()
    {
        \Illuminate\Support\Facades\DB::beginTransaction();

        $response = $this->actingAs(TestHelper::user('user'), 'api')
            ->get("/api/v1/user/" . \App\Models\User::inRandomOrder()->first()->id)
            ->assertStatus(200);

        \Illuminate\Support\Facades\DB::rollBack();

        TestHelper::testDump($response, 'delete');
        
    }


    public function test_update()
    {
        $user_factory = \App\Models\User::factory()->make()->toArray();

        \App\Utils\Helpers\TestHelper::ExportForPostman($user_factory);

        $user_id =  \App\Models\User::inRandomOrder()->first()->id;

        $response = $this->actingAs(TestHelper::user('user'), 'api')
            ->post("api/v1/user/$user_id", $user_factory)
            ->assertStatus(201);

        TestHelper::testDump($response, 'create');
    }



    public function test_create()
    {
        $user_factory = \App\Models\User::factory()->make()->toArray();

        \App\Utils\Helpers\TestHelper::ExportForPostman($user_factory);

        \Illuminate\Support\Facades\DB::beginTransaction();

        $response = $this->actingAs(TestHelper::user('user'), 'api')
            ->post("api/v1/user/", $user_factory, ['Content-Type' => 'multipart/form-data', 'Accept' => 'application/json',])
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
