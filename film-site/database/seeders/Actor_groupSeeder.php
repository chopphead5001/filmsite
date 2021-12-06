<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
Use \Carbon\Carbon;

class Actor_groupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        DB::table('actor_groups')->insert([
            'actor' => 'Henry Thomas',
            'film' => '1',
            'created_at' => $ldate = Carbon::now(),
            'updated_at' => $ldate = Carbon::now(),
        ]);

        DB::table('actor_groups')->insert([
            'actor' => 'Pat Welsh',
            'film' => '1',
            'created_at' => $ldate = Carbon::now(),
            'updated_at' => $ldate = Carbon::now(),
        ]);

        DB::table('actor_groups')->insert([
            'actor' => 'Robert MacNaughton',
            'film' => '1',
            'created_at' => $ldate = Carbon::now(),
            'updated_at' => $ldate = Carbon::now(),
        ]);

        DB::table('actor_groups')->insert([
            'actor' => 'Laonardo Dicaprio',
            'film' => '2',
            'created_at' => $ldate = Carbon::now(),
            'updated_at' => $ldate = Carbon::now(),
        ]);

    }
}
