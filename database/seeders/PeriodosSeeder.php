<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeriodosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['descripcion' => 'Primero','id_nivel' => 1],
            ['descripcion' => 'Segundo','id_nivel' => 1],
            ['descripcion' => 'Tercero','id_nivel' => 1],
            ['descripcion' => 'Cuarto','id_nivel' => 1],
            ['descripcion' => 'Quinto','id_nivel' => 1],
            ['descripcion' => 'Sexto','id_nivel' => 1],
            ['descripcion' => 'Primero','id_nivel' => 2],
            ['descripcion' => 'Segundo','id_nivel' => 2],
            ['descripcion' => 'Tercero','id_nivel' => 2],
            ['descripcion' => 'Cuarto','id_nivel' => 2],
            ['descripcion' => 'Quinto','id_nivel' => 2]
        ];

        DB::table('periodos')->insert($data);
    }
}
