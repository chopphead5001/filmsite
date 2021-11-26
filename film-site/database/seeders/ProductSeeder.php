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
            'actor' => 1,
            'synopsis' => 'Un pequeño extraterrestre de otro planeta queda abandonado en la Tierra cuando su nave se olvida de él. Está completamente solo y asustado hasta que Elliott, un niño de nueve años, lo encuentra y decide esconderlo en su casa para protegerlo. El chico y sus hermanos intentarán encontrar la forma de devolver al extraterrestre a su planeta antes de que lo encuentren los científicos y la policía.',
            'year' => 1980,
            'userid' => 1,
            'photopath' => 'images/default.png',
            'created_at' => $ldate = Carbon::now(),
            'updated_at' => $ldate = Carbon::now(),

        ]);

        DB::table('products')->insert([
            'title' => 'Once Upon a Time in Hollywood',
            'director' => 'Roman Polanski',
            'actor' => '2',
            'synopsis' => 'A finales de los 60, Hollywood empieza a cambiar y el actor Rick Dalton trata de adaptarse a los nuevos tiempos. Junto a su doble, ambos experimentan problemas para modificar sus hábitos, debido a lo enraizados que están. Al mismo tiempo, nace una relación entre Rick y la actriz Sharon Tate, que fue víctima de la familia Manson en la matanza de 1969.',
            'year' => '1980',
            'userid' => 1,
            'photopath' => 'images/default.png',
            'created_at' => $ldate = Carbon::now(),
            'updated_at' => $ldate = Carbon::now(),

        ]);
    }
}
