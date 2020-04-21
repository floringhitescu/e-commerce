<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => 'Florin Ursu',
            'email' => 'florin@admin.com',
            'password' => Hash::make('12345678'),
        ]);

        User::create([
            'name' => 'Adrian Smith',
            'email' => 'adrian@admin.com',
            'password' => Hash::make('12345678'),
        ]);

    }
}
