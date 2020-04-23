<?php

use App\Role;
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

        $user = Role::create([
            'name' => 'user'
        ]);

        $admin = Role::create([
            'name' => 'admin'
        ]);

        User::create([
            'name'      => 'Florin Ursu',
            'email'     => 'florin@beautypro.com',
            'password'  => Hash::make('12345678'),
            'role_id'  => $user->id
        ]);

        User::create([
            'name' => 'Adrian Smith',
            'email' => 'adrian@beautypro.com',
            'password' => Hash::make('12345678'),
            'role_id'  => $user->id
        ]);

        User::create([
            'name' => 'Florin Ciprian',
            'email' => 'admin@beautypro.com',
            'password' => Hash::make('12345678'),
            'role_id'  => $admin->id
        ]);

    }
}
