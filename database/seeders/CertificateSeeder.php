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
            [
                'title' => 'SQL',
                'description' => 'SQL - Skillmea',
                'status' => 1,
                'img' => 'sql.jpg',
            ],
            [
                'title' => 'Laravel',
                'description' => 'OOP a Laravel - Skillmea',
                'status' => 1,
                'img' => 'laravel.jpg',
            ],
            [
                'title' => 'OOP',
                'description' => 'Objektovo orientované programovanie - Skillmea',
                'status' => 1,
                'img' => 'oop.jpg',
            ],
            [
                'title' => 'Wordpress',
                'description' => 'Wordpress pre programátora: Témy - Skillmea',
                'status' => 1,
                'img' => 'wrdpress1.jpg',
            ],
            [
                'title' => 'Wordpress',
                'description' => 'Wordpress pre programátora: Pluginy - Skillmea',
                'status' => 1,
                'img' => 'wrdpress2.jpg',
            ],
            [
                'title' => 'SEO',
                'description' => 'Pokročilé SEO stratégie - Skillmea',
                'status' => 1,
                'img' => 'seo.jpg',
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
