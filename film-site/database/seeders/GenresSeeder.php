<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
Use \Carbon\Carbon;

class GenresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        
        DB::table('Genres')->insert([
            'name' => 'Accion',
            'created_at' => $ldate = Carbon::now(),
            'updated_at' => $ldate = Carbon::now(),
        ]);

        DB::table('Genres')->insert([
            'name' => 'Aventura',
            'created_at' => $ldate = Carbon::now(),
            'updated_at' => $ldate = Carbon::now(),
        ]);

        DB::table('Genres')->insert([
            'name' => 'Ciencia Ficcion',
            'created_at' => $ldate = Carbon::now(),
            'updated_at' => $ldate = Carbon::now(),
        ]);

        DB::table('Genres')->insert([
            'name' => 'Comdia',
            'created_at' => $ldate = Carbon::now(),
            'updated_at' => $ldate = Carbon::now(),
        ]);

        DB::table('Genres')->insert([
            'name' => 'Documental',
            'created_at' => $ldate = Carbon::now(),
            'updated_at' => $ldate = Carbon::now(),
        ]);
        
        DB::table('Genres')->insert([
            'name' => 'Drama',
            'created_at' => $ldate = Carbon::now(),
            'updated_at' => $ldate = Carbon::now(),
        ]);

        DB::table('Genres')->insert([
            'name' => 'Terror',
            'created_at' => $ldate = Carbon::now(),
            'updated_at' => $ldate = Carbon::now(),
        ]);

        DB::table('Genres')->insert([
            'name' => 'Fantasia',
            'created_at' => $ldate = Carbon::now(),
            'updated_at' => $ldate = Carbon::now(),
        ]);

        DB::table('Genres')->insert([
            'name' => 'Musical',
            'created_at' => $ldate = Carbon::now(),
            'updated_at' => $ldate = Carbon::now(),
        ]);

        DB::table('Genres')->insert([
            'name' => 'Animacion',
            'created_at' => $ldate = Carbon::now(),
            'updated_at' => $ldate = Carbon::now(),
        ]);

    }
}
