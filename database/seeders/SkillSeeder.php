<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skills = [
            [
                'title' => 'JavaScript, jQuery',
                'description' => 'pokročilý',
                'status' => 1,
                'progress' => 74,
            ],
            [
                'title' => 'PHP',
                'description' => 'pokročilý',
                'status' => 1,
                'progress' => 76,
            ],
            [
                'title' => 'Laravel',
                'description' => 'pokročilý',
                'status' => 1,
                'progress' => 70,
            ],
            [
                'title' => 'Laravel Nova',
                'description' => 'pokročilý',
                'status' => 1,
                'progress' => 78,
            ],
            [
                'title' => 'Vue',
                'description' => 'stredne pokročilý',
                'status' => 1,
                'progress' => 70,
            ],
            [
                'title' => 'CSS',
                'description' => 'pokročilý',
                'status' => 1,
                'progress' => 70,
            ],
            [
                'title' => 'Git, Github',
                'description' => 'pokročilý',
                'status' => 1,
                'progress' => 75,
            ],
            [
                'title' => 'HTML',
                'description' => 'profesionál',
                'status' => 1,
                'progress' => 90,
            ],
            [
                'title' => 'SQL',
                'description' => 'stredne pokročilý',
                'status' => 1,
                'progress' => 60,
            ],
            [
                'title' => 'Tailwind CSS, Sass',
                'description' => 'stredne pokročilý',
                'status' => 1,
                'progress' => 60,
            ],
            [
                'title' => 'Bootstrap, Bulma',
                'description' => 'stredne pokročilý',
                'status' => 1,
                'progress' => 60,
            ],
            [
                'title' => 'Npm, Composer',
                'description' => 'pokročilý',
                'status' => 1,
                'progress' => 74,
            ],
            [
                'title' => 'Adobe Photoshop',
                'description' => 'pokročilý',
                'status' => 1,
                'progress' => 70,
            ],
            [
                'title' => 'Wordpress, Woocomerce',
                'description' => 'pokročilý',
                'status' => 1,
                'progress' => 75,
            ],
            [
                'title' => 'SEO',
                'description' => 'pokročilý',
                'status' => 1,
                'progress' => 68,
            ],
        ];

        foreach ($skills as $skill) {
            Skill::create([
                'title' => $skill['title'],
                'description' => $skill['description'],
                'status' => $skill['status'],
                'progress' => $skill['progress'],
            ]);
        }

    }
}
