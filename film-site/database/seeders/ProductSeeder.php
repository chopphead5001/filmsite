<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
Use \Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        
        DB::table('products')->insert([
            'title' => 'mulan',
            'country' => 'usa',
            'price' => 500,
            'userid' => 1,
            'created_at' => $ldate = Carbon::now(),
            'updated_at' => $ldate = Carbon::now(),
        ]);

        DB::table('products')->insert([
            'title' => 'halloween',
            'country' => 'usa',
            'price' => 400,
            'userid' => 2,
            'created_at' => $ldate = Carbon::now(),
            'updated_at' => $ldate = Carbon::now(),
        ]);
    }
}
