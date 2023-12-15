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
                'key' => 'general_email',
                'value' => '1plus1@test.sk'
            ],
            [
                'key' => 'company',
                'value' => '1plus1',
            ],

        ];

        foreach ($values as $value) {
            DB::table(NovaSettings::getSettingsTableName())->insert([
                $value
            ]);
        }

    }
}
