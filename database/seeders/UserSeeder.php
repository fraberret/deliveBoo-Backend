<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Francesco Berretta',
                'email' => 'francesco@example.com',
                'password' => 'Password1'
            ],
            [
                'name' => 'Daniele Colaci',
                'email' => 'daniele@example.com',
                'password' => 'Password1'
            ],
            [
                'name' => "Nicola Dell'Olio",
                'email' => 'nico@example.com',
                'password' => 'Password1'
            ],
            [
                'name' => 'Riccardo Imperiale',
                'email' => 'riccardo@example.com',
                'password' => 'Password1'
            ],
            [
                'name' => 'Nicola Serra',
                'email' => 'nicola@example.com',
                'password' => 'Password1'
            ]
        ];

        foreach ($users as $user) {
            $newUser = new User();
            $newUser->name = $user['name'];
            $newUser->email = $user['email'];
            $newUser->password = Hash::make($user['password']);
            $newUser->save();
        }
    }
}
