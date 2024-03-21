<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => 'aashatech',
            'email' => 'info.aashatech@gmail.com',
            'password' => Hash::make('password'),
        ]);
        // DB::table('users')->insert([
        //     'name' => 'aashatech',
        //     'email' => 'info.aashatech@gmail.com',
        //     'password' => '$2a$12$k1ex0bCS/9RU/FXbFJo/yu0WxXRCmpyPpqQcTm5jZd369ULYwaOUi',
        // ]);
    }
}
