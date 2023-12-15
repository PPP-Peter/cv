<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OuthClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('oauth_clients')->insert([
            'name' => 'Laravel Password Grant Client',
            'id' => env('PASSPORT_PASSWORD_GRANT_CLIENT_ID'),
            'secret' => env('PASSPORT_PASSWORD_GRANT_CLIENT_SECRET'),
            'provider' => 'users',
            'personal_access_client' => 0,
            'password_client' => 1,
            'revoked' => 0,
            'redirect' => 'http://localhost'
        ]);

        DB::table('oauth_clients')->insert([
            'id' => env('PASSPORT_PERSONAL_ACCESS_CLIENT_ID'),
            'name' => 'Laravel Personal Access Client',
            'secret' => env('PASSPORT_PERSONAL_ACCESS_CLIENT_SECRET'),
            'provider' => null,
            'personal_access_client' => 1,
            'password_client' => 0,
            'revoked' => 0,
            'redirect' => 'http://localhost'
        ]);

        DB::table('oauth_personal_access_clients')->insert([
            'id' => 1,
            'client_id' => 2,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now(),
        ]);
    }
}
