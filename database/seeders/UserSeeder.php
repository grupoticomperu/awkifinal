<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    public function run()
    {
        
        User::create([
            'name'=>'admin',
            'email'=>'admin@awki.com.pe',
            'password'=>bcrypt('12345678')
        ])->assignRole('Admin');

        User::create([
            'name'=>'admin2',
            'email'=>'admin2@awki.com.pe',
            'password'=>bcrypt('12345678')
        ])->assignRole('Admin');


        User::create([
            'name'=>'admin3',
            'email'=>'admin3@awki.com.pe',
            'password'=>bcrypt('12345678')
        ])->assignRole('Admin');

        User::create([
            'name'=>'admin4',
            'email'=>'admin4@awki.com.pe',
            'password'=>bcrypt('12345678')
        ])->assignRole('Admin');

        User::create([
            'name'=>'supervisor',
            'email'=>'supervisor@awki.com.pe',
            'password'=>bcrypt('12345678')
        ])->assignRole('Supervisor');

        User::create([
            'name'=>'supervisor2',
            'email'=>'supervisor2@awki.com.pe',
            'password'=>bcrypt('12345678')
        ])->assignRole('Supervisor');

     //  User::factory(4)->create();

    }
}
