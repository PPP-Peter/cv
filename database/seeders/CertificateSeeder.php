<?php

namespace Database\Seeders;

use App\Models\Certificate;
use Illuminate\Database\Seeder;

class CertificateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $certificates = [
            [
                'title' => 'JavaScript',
                'description' => 'JavaScript a ES6 - Skillmea',
                'status' => 1,
                'img' => 'js.jpg',
            ],
            [
                'title' => 'PHP',
                'description' => 'PHP - Skillmea',
                'status' => 1,
                'img' => 'php.jpg',
            ],
        ];

        foreach ($certificates as $certificate) {

            $entity = Certificate::create([
                'title' => $certificate['title'],
                'description' => $certificate['description'],
                'status' => $certificate['status'],
            ]);

            ToolSeeder::upload_and_copy_images($certificate['img'], 'certificates', 'certificate', $entity);
        }
    }
}
