<?php

namespace Database\Seeders;

use App\Models\Tool;
use Illuminate\Database\Seeder;

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
            ],
            [
                'title' => 'Visual Studio Code',
                'description' => 'Editor',
                'status' => 1,
                'priority' => 2,
            ],
        ];

        foreach ($tools as $tool) {
            Tool::create([
                'title' => $tool['title'],
                'description' => $tool['description'],
                'status' => $tool['status'],
                'priority' => $tool['priority'],
            ]);
        }
    }
}
