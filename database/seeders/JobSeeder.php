<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobs = [
            [
                'title' => 'Backend Developer',
                'company' => 'WAME',
                'description' => 'Laravel a Laravel nova',
                'from' => Carbon::parse('2022-01-01'),
                'to' => Carbon::parse('2023-01-01'),

            ],
            [
                'title' => 'Wordpres programátor',
                'company' => 'B-commerce',
                'description' => 'Wordpres stránky a Woocomerce eshopy',
                'from' => Carbon::parse('2022-01-01'),
                'to' => Carbon::parse('2021-01-01'),
            ],
        ];

        foreach ($jobs as $job) {
            Job::create([
                'title' => $job['title'],
                'company' => $job['company'],
                'description' => $job['description'],
                'from' => $job['from'],
                'to' => $job['to'],
            ]);
        }
    }
}
