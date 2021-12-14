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
            'title' => 'E.T',
            'director' => 'Steven Spielberg',
            'genre' => 'Fantasia',
            'synopsis' => 'Un pequeño extraterrestre de otro planeta queda abandonado en la Tierra cuando su nave se olvida de él. Está completamente solo y asustado hasta que Elliott, un niño de nueve años, lo encuentra y decide esconderlo en su casa para protegerlo. El chico y sus hermanos intentarán encontrar la forma de devolver al extraterrestre a su planeta antes de que lo encuentren los científicos y la policía.',
            'year' => 1982,
            'userid' => 1,
            'photopath' => 'images/default.png',
            'created_at' => $ldate = Carbon::now(),
            'updated_at' => $ldate = Carbon::now(),

        ]);

        DB::table('products')->insert([
            'title' => 'Once Upon a Time in Hollywood',
            'director' => 'Roman Polanski',
            'genre' => 'Drama',
            'synopsis' => 'A finales de los 60, Hollywood empieza a cambiar y el actor Rick Dalton trata de adaptarse a los nuevos tiempos. Junto a su doble, ambos experimentan problemas para modificar sus hábitos, debido a lo enraizados que están. Al mismo tiempo, nace una relación entre Rick y la actriz Sharon Tate, que fue víctima de la familia Manson en la matanza de 1969.',
            'year' => '2019',
            'userid' => 2,
            'photopath' => 'images/default.png',
            'created_at' => $ldate = Carbon::now(),
            'updated_at' => $ldate = Carbon::now(),

        ]);
    }
}
