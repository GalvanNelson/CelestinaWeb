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
        User::insert([
            'name' => 'Erwin Erick Ureña Inarra',
            'email' => 'ericksapiens@gmail.com',
            'password' => bcrypt('12345678'),
        ]);        
        Team::insert([
            'user_id' => '1',
            'name' => 'Propietario',
            'personal_team' => 'true',
        ]);
        User::insert([
            'name' => 'Evans Balcazar Veizaga',
            'email' => 'evansbv@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        Team::insert([
            'user_id' => '2',
            'name' => 'Vendedor',
            'personal_team' => 'true',
        ]);
         User::insert([
            'name' => 'Fabian Galvan',
            'email' => 'fabian@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
        Team::insert([
            'user_id' => '3',
            'name' => 'Cliente',
            'personal_team' => 'true',
        ]);
    }
}
