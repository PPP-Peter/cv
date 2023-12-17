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
                'company' => 'WAME s.r.o.',
                'description' => 'Tvorba backendu pre mobilné a webové aplikácie v laraveli, príprava api pre frontend, kompletné administračné rozhranie v Laravel Nova a Vue.js',
                'from' => Carbon::parse('2022-01-01'),
                'to' => Carbon::parse('2023-12-30'),

            ],
            [
                'title' => 'Fullstack / Wordpress developer',
                'company' => 'B-commerce s.r.o.',
                'description' => 'Kompletná správa, tvorba, úprava a optimalizácia e-shopov a stránok postavených na Wordpresse, vývoj vlastných pluginov a funkcií, úprava CSS,  implementácia externých riešení.',
                'from' => Carbon::parse('2020-10-01'),
                'to' => Carbon::parse('2021-12-30'),
            ],
            [
                'title' => 'Office manager',
                'company' => 'Landberg s.r.o',
                'description' => 'Komunikácia s klientmi, koordinácia zamestnancov, správa a servis PC siete a techniky, výdaj a evidencia náradia, objednávanie tovaru, kontrola údržba a servis vozidiel, grafické práce, reklamné činnosti, správa webu, správa dochádzkového systému, Word, Excel...',
                'from' => Carbon::parse('2015-01-01'),
                'to' => Carbon::parse('2019-12-30'),
            ],
            [
                'title' => 'Administratívny pracovník',
                'company' => 'Haltex s.r.o.',
                'description' => 'Správa eshopu a práca s PC (Word, Excel, internet,... ), kontakt so zákazníkmi...',
                'from' => Carbon::parse('2014-01-01'),
                'to' => Carbon::parse('2015-01-01'),
            ],
            [
                'title' => 'Asistent fotografa / šofér osobného auta',
                'company' => 'Micor s.r.o.',
                'description' => 'riadenie a údržba osobného vozidla, výpomoc s náradím a organizovaním, kontakt s klientmi...',
                'from' => Carbon::parse('2012-01-01'),
                'to' => Carbon::parse('2014-01-01'),
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
