<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RolesAndPermissionsSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CertificateSeeder::class);
        $this->call(SkillSeeder::class);
        $this->call(ToolSeeder::class);
        $this->call(JobSeeder::class);
        $this->call(NovaSettingsSeeder::class);
      //  $this->call(OuthClientsSeeder::class);
    }
}
