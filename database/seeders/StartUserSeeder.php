<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Nette\Utils\Strings;

class StartUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $super_admin = User::updateOrCreate(
            [
                "email" => "test1@wame.sk",
            ],
            [
                "name" => "admin",
                "email" => "test1@wame.sk",
                "email_verified_at" => now(),
                "password" =>  Hash::make("testwame"),
                "created_at" => now()->subMonth(1),
            ]
        );
//            ->assignRole("super-admin");
//        $super_admin->syncRoles(["super-admin"]);


        $faker = Factory::create("sk_SK");
        for ($x = 0; $x <= 11; $x++) {
            $firstName = $faker->firstName;
            $lastName = $faker->lastName;
            $email = Strings::toAscii(strtolower($firstName . "." . $lastName)) . "@wame.sk";
            $user = User::updateOrCreate(
                [
                    "email" => $email
                ],
                [
                    "name" => $firstName . " " . $lastName,
                    "email" => $email,
                    "password" => Hash::make("password"),
                ]
            );
        }
    }
}
