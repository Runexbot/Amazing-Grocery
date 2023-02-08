<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            GenderSeeder::class,
            RoleSeeder::class,
            ItemSeeder::class
        ]);

        DB::table('users')->insert([
            ['role_id' => 1, 'gender_id' => 1, 'first_name' => 'a', 'last_name' => 'b', 'email' => 'admin@gmail.com',
             'display_picture' => 'null', 'password' => bcrypt('123123123')],
             ['role_id' => 2, 'gender_id' => 1, 'first_name' => 'a', 'last_name' => 'b', 'email' => 'user@gmail.com',
             'display_picture' => 'null', 'password' => bcrypt('123123123')]
        ]);
    }
}
