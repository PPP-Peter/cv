<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Nette\Utils\Strings;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //super admin
        $super_admin = $this->getUpdateOrCreate('wame@wame.sk', 'Wame',  Hash::make('testwame'), ['id' => '01gzbb5nnjyb7k0tn659e1v1k1'] )
            ->syncRoles('super-admin');

        // admin
        $super_admin = $this->getUpdateOrCreate('test1@wame.sk', 'Admin',  Hash::make('testwame'), ['id' => '01gzbb5nnjyb7k0tn659e1v1kq'] )
            ->syncRoles('admin');

        // manager
        $manager = $this->getUpdateOrCreate('test2@wame.sk', 'Manažér',  Hash::make('testwame'),  null)
            ->assignRole('manager');

        //user
        $testuser = $this->getUpdateOrCreate('testuser@wame.sk', 'Test User',  Hash::make('testwame'), null )
            ->assignRole('user');

        // frontak
        $frontak = $this->getUpdateOrCreate('ado.stosil@gmail.com', 'Ado Test', Hash::make('testwame'), null)
            ->assignRole('user');

        // managers
        for ($x = 0; $x <=  env('MANAGERS_SEEDS_COUNT', 4); $x++) {
            $this->getUpdateOrCreate(null, null, null, null )->assignRole('manager');
        }

        // users
        $countAll = env('USERS_SEEDS_COUNT', 10);
        for ($x = 0; $x <= $countAll; $x++) {
            //$more = ['group_id' => Group::all()->random()->id];
            $more = null;
            $this->getUpdateOrCreate(null, null, null, $more )->assignRole('user');

            $this->command->getOutput()->text("Importing {$x}/{$countAll} users...");
            $this->command->getOutput()->progressStart($x);
        }

    }


    private function getUpdateOrCreate($email, $name, $password, $more)
    {
        $faker = Factory::create('sk_SK');
        $firstName = $faker->firstName;
        $lastName = $faker->lastName;
        $name = $name ?: $firstName . ' ' . $lastName;
        $email = $email ?: Strings::toAscii(strtolower($firstName . '.' . $lastName)) . '@wame.sk';
        $password = $password ?: Hash::make('password');
        $randomNumber = random_int(1, 10);
        $more ? $more = [key($more) =>  $more[key($more)]]: $more = [];

        $count = 5;
        $countProgress = 10;
        $countAll = 100;
        $this->command->getOutput()->text("Importing {$countProgress}/{$countAll} users...");
        $this->command->getOutput()->progressStart($count);

        return User::updateOrCreate(
            [
                'email' => $email
            ],
            [
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'created_at' => now()->subMonth($randomNumber),
                'email_verified_at' => now(),
                ...$more,
                //'phone' => $faker->phoneNumber,
            ]
        );
    }
}
