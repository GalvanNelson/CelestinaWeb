<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Team;
use App\Models\TeamUser;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();
        Team::truncate();

        Team::insert([
            'user_id' => '1',
            'name' => 'propietario',
            'personal_team' => 'true',
        ]);
        Team::insert([
            'user_id' => '2',
            'name' => 'vendedor',
            'personal_team' => 'true',
        ]);
        Team::insert([
            'user_id' => '3',
            'name' => 'cliente',
            'personal_team' => 'true',
        ]);

        User::insert([
            'name' => 'Erwin Erick Ureña Inarra',
            'email' => 'ericksapiens@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        User::insert([
            'name' => 'Evans Balcazar Veizaga',
            'email' => 'evansbv@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        User::insert([
            'name' => 'Fabian Galvan',
            'email' => 'fabian@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        TeamUser::insert([
            'user_id' => '1',
            'team_id' => '1',
            'role' => 'propietario',
        ]);
        TeamUser::insert([
            'user_id' => '2',
            'team_id' => '2',
            'role' => 'vendedor',
        ]);
        TeamUser::insert([
            'user_id' => '3',
            'team_id' => '3',
            'role' => 'cliente',
        ]);
    }
}
