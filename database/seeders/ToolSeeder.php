<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;
use Illuminate\Http\UploadedFile;

class ToolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tools = [
            [
                'title' => 'Php Storm',
                'description' => 'IDE',
                'status' => 1,
                'priority' => 1,
                'img' => 'phpstorm.png',
            ],
            [
                'title' => 'Visual Studio Code',
                'description' => 'Editor',
                'status' => 1,
                'priority' => 2,
                'img' => 'vs.png',
            ],
            [
                'title' => 'Git / GitHub',
                'description' => 'Verzovanie kódu',
                'status' => 1,
                'priority' => 3,
                'img' => 'github.png',
            ],
            [
                'title' => 'Heidi SQL',
                'description' => 'Práca s DB',
                'status' => 1,
                'priority' => 4,
                'img' => 'heidi.png',
            ],
            [
                'title' => 'MAMP / Laragon',
                'description' => 'Pre prácu na localhoste',
                'status' => 1,
                'priority' => 5,
                'img' => 'mamp.png',
            ],
            [
                'title' => 'Postman / Insomnia',
                'description' => 'Pre testovanie API',
                'status' => 1,
                'priority' => 6,
                'img' => 'postman.png',
            ],
            [
                'title' => 'Cmder',
                'description' => 'Pre prácu s konzolou / príkazový terminál',
                'status' => 1,
                'priority' => 7,
                'img' => 'cmder.png',
            ],
            [
                'title' => 'Chat GPT',
                'description' => 'Užitočný pomocník pri písaní kódu',
                'status' => 1,
                'priority' => 8,
                'img' => 'chatgpt.png',
            ],
            [
                'title' => 'Photoshop',
                'description' => 'Pre úpravu a tvorbu grafiky',
                'status' => 1,
                'priority' => 9,
                'img' => 'photoshop.png',
            ],
        ];

        foreach ($tools as $tool) {
           $entity = Tool::updateOrCreate(
               [
                   'title' => $tool['title'],
               ],
               [
                'title' => $tool['title'],
                'description' => $tool['description'],
                'status' => $tool['status'],
                'priority' => $tool['priority'],
            ]
           );

            $this->upload_and_copy_images($tool['img'], 'tools', 'tool', $entity);

        }
    }

    /**
     * @param $img
     * @return string[]
     */
    public static function upload_and_copy_images($img, $path, $name, $entity): array
    {
        $image_path = storage_path("app/public/img/$path/");
        $image_path_copy = storage_path("app/public/img/$path-copy/");
        $image = $image_path . $img;
        $image_copy = $image_path_copy . $img;
        (copy($image, $image_copy));

        $entity->addMedia($image)->toMediaCollection($name . "_image");
        $entity->save();

        (copy($image_copy, $image));

        return array($image, $image_copy);
    }
}
