<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create(
            [
                'role_id' => 0,
                'name' => 'Nguyễn Thành',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456789'),
                'phone' => '0334736187',
                'address' => 'Hà Đông'
            ],
            [
                'role_id' => 1,
                'name' => 'Nguyễn Tiến Thành',
                'email' => 'nguyentienthanh9291server@gmail.com',
                'password' => bcrypt('123456789'),
                'phone' => '0334736188',
                'address' => 'Hà Đông'
            ],
        );
    }
}
