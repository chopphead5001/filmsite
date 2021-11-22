<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
Use \Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('1234'),
            'role' => 'admin',
            'created_at' => $ldate = Carbon::now(),
            'updated_at' => $ldate = Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@test.com',
            'password' => bcrypt('1234'),
            'created_at' => $ldate = Carbon::now(),
            'updated_at' => $ldate = Carbon::now(),
        ]);
    }
}
