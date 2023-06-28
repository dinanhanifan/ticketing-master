<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'user',
                'email' => 'user@usermail.com',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('123456'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
