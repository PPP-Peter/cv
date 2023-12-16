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
                'title' => 'JavaScript',
                'description' => 'pokročilý',
                'status' => 1,
                'progress' => 80,
            ],
            [
                'title' => 'PHP',
                'description' => 'pokročilý',
                'status' => 1,
                'progress' => 80,
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
