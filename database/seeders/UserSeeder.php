<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::insert(
            [
                [
                    'name' => 'Mahmoud Noh',
                    'email' => 'noh@gmail.com',
                    'password' => bcrypt('123456')
                ],
                [
                    'name' => 'Mohamed Noh',
                    'email' => 'mohamed@gmail.com',
                    'password' => bcrypt('123456')
                ],
                [
                    'name' => 'amr',
                    'email' => 'amr@gmail.com',
                    'password' => bcrypt('123456')
                ],
                [
                    'name' => 'ali',
                    'email' => 'ali@gmail.com',
                    'password' => bcrypt('123456')
                ],
            ]
        );
    }
}
