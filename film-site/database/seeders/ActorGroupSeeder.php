<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
Use \Carbon\Carbon;

class ActorGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        DB::table('actorgroup')->insert([
            'actor' => '11',
            'film' => '1',
            'created_at' => $ldate = Carbon::now(),
            'updated_at' => $ldate = Carbon::now(),
        ]);

        DB::table('actorgroup')->insert([
            'actor' => '12',
            'film' => '1',
            'created_at' => $ldate = Carbon::now(),
            'updated_at' => $ldate = Carbon::now(),
        ]);

        DB::table('actorgroup')->insert([
            'actor' => '13',
            'film' => '1',
            'created_at' => $ldate = Carbon::now(),
            'updated_at' => $ldate = Carbon::now(),
        ]);

        DB::table('actorgroup')->insert([
            'actor' => '9',
            'film' => '2',
            'created_at' => $ldate = Carbon::now(),
            'updated_at' => $ldate = Carbon::now(),
        ]);

    }
}
