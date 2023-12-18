<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Outl1ne\NovaSettings\NovaSettings;

class NovaSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values = [
            // vseobecne
            [
                'key' => 'address',
                'value' => 'Hervartov 68'
            ],
            [
                'key' => 'phone',
                'value' => '+421948098889',
            ],
            [
                'key' => 'email',
                'value' => 'p.petermanik@gmail.com',
            ],

        ];

        foreach ($values as $value) {
            DB::table(NovaSettings::getSettingsTableName())->insert([
                $value
            ]);
        }

    }
}
