<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
Use \Carbon\Carbon;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        DB::table('photos')->insert([
            'path' => 'images/default.jpg',
            'created_at' => $ldate = Carbon::now(),
            'updated_at' => $ldate = Carbon::now(),
        ]);
    }
}
