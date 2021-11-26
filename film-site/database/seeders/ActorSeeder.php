<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
Use \Carbon\Carbon;

class ActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        DB::table('actor')->insert([
            'name' => 'Will Smith',
            'created_at' => $ldate = Carbon::now(),
            'updated_at' => $ldate = Carbon::now(),
        ]);

        DB::table('actor')->insert([
            'name' => 'Johnny Depp',
            'created_at' => $ldate = Carbon::now(),
            'updated_at' => $ldate = Carbon::now(),
        ]);

        DB::table('actor')->insert([
            'name' => 'Adam Sandler',
            'created_at' => $ldate = Carbon::now(),
            'updated_at' => $ldate = Carbon::now(),
        ]);

        DB::table('actor')->insert([
            'name' => 'Vin Diesel',
            'created_at' => $ldate = Carbon::now(),
            'updated_at' => $ldate = Carbon::now(),
        ]);

        DB::table('actor')->insert([
            'name' => 'Jackie Chan',
            'created_at' => $ldate = Carbon::now(),
            'updated_at' => $ldate = Carbon::now(),
        ]);

        DB::table('actor')->insert([
            'name' => 'Morgan Freeman',
            'created_at' => $ldate = Carbon::now(),
            'updated_at' => $ldate = Carbon::now(),
        ]);

        DB::table('actor')->insert([
            'name' => 'Brad pit',
            'created_at' => $ldate = Carbon::now(),
            'updated_at' => $ldate = Carbon::now(),
        ]);

        DB::table('actor')->insert([
            'name' => 'Angelina Jolie',
            'created_at' => $ldate = Carbon::now(),
            'updated_at' => $ldate = Carbon::now(),
        ]);

        DB::table('actor')->insert([
            'name' => 'Laonardo Dicaprio',
            'created_at' => $ldate = Carbon::now(),
            'updated_at' => $ldate = Carbon::now(),
        ]);

        DB::table('actor')->insert([
            'name' => 'Robin Williams',
            'created_at' => $ldate = Carbon::now(),
            'updated_at' => $ldate = Carbon::now(),
        ]);

        DB::table('actor')->insert([
            'name' => 'Henry Thomas',
            'created_at' => $ldate = Carbon::now(),
            'updated_at' => $ldate = Carbon::now(),
        ]);

        DB::table('actor')->insert([
            'name' => 'Pat Welsh',
            'created_at' => $ldate = Carbon::now(),
            'updated_at' => $ldate = Carbon::now(),
        ]);

        DB::table('actor')->insert([
            'name' => 'Robert MacNaughton',
            'created_at' => $ldate = Carbon::now(),
            'updated_at' => $ldate = Carbon::now(),
        ]);

    }
}
