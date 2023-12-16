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
                'status' => 1
            ],
            [
                'title' => 'PHP',
                'description' => 'PHP - Skillmea',
                'status' => 1
            ],
        ];

        foreach ($certificates as $certificate) {
            Certificate::create([
                'title' => $certificate['title'],
                'description' => $certificate['description'],
                'status' => $certificate['status'],
            ]);
        }
    }
}
