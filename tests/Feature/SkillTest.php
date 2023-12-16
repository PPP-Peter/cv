<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SkillTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {

        // SETTINGS
        $user = 'user';                         // exp: rola ktora vytvara poziciu
        $draft = true;                          // exp: ako draft
        $videos_seeds = false;                  // exp: aj videa

        /**
         * Images
         */
        $images_path = glob(storage_path('app/testing/photos/*'));  // *.jpg
        $images_path_count = count(glob(storage_path('app/testing/photos/*')));
        $random_image = $images_path[rand(0, $images_path_count -1)];
        // Vytvoríme kópiu
        $copyPath = storage_path('app/testing/photos/') . random_int(1,9) .  basename($random_image);
        \Illuminate\Support\Facades\File::copy($random_image, $copyPath);
        // Upload
        $uploaded_image = new \Illuminate\Http\UploadedFile($random_image, 'photo.jpg', 'jpg', null, true);


        /**
        * FACTORY
        */
        $user_factory = \App\Models\Skill::factory()->make()->toArray();

        /**
         * SEND DATA
         */
        $user = \App\Utils\Helpers\TestHelper::user($user);
        $data = [
            'user_id' => $user->id,
            'about' => 'o mne',
            'avatar' => $uploaded_image,
            'prev_position1' => fake()->word(),
            'prev_position1_duration' => (string) random_int(1,7),
        ];

        \App\Utils\Helpers\TestHelper::ExportForPostman($data);

        /**
         * POST
         */
        $response = $this->actingAs($user, 'api')
            ->post("api/v1/user", $data)   // or $user_factory
            ->assertStatus(200);


        /**
         * RESPONSE
         */
        dump($user->id);
        dump($user->name);

        \App\Utils\Helpers\TestHelper::testDump($response, 'message');

            }
}
