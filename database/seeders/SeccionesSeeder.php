<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeccionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=SeccionesSeeder
     * @return void
     */
    public function run()
    {
        $data = [
            ['descripcion' => 'A','id_grado' => 1],
            ['descripcion' => 'B','id_grado' => 1],
            ['descripcion' => 'C','id_grado' => 1],
            ['descripcion' => 'D','id_grado' => 1],
            ['descripcion' => 'A','id_grado' => 2],
            ['descripcion' => 'B','id_grado' => 2],
            ['descripcion' => 'C','id_grado' => 2],
            ['descripcion' => 'D','id_grado' => 2],
            ['descripcion' => 'A','id_grado' => 3],
            ['descripcion' => 'B','id_grado' => 3],
            ['descripcion' => 'C','id_grado' => 3],
            ['descripcion' => 'D','id_grado' => 3],
            ['descripcion' => 'A','id_grado' => 4],
            ['descripcion' => 'B','id_grado' => 4],
            ['descripcion' => 'C','id_grado' => 4],
            ['descripcion' => 'D','id_grado' => 4],
            ['descripcion' => 'A','id_grado' => 5],
            ['descripcion' => 'B','id_grado' => 5],
            ['descripcion' => 'C','id_grado' => 5],
            ['descripcion' => 'D','id_grado' => 5],
            ['descripcion' => 'A','id_grado' => 6],
            ['descripcion' => 'B','id_grado' => 6],
            ['descripcion' => 'C','id_grado' => 6],
            ['descripcion' => 'D','id_grado' => 6],
            ['descripcion' => 'A','id_grado' => 7],
            ['descripcion' => 'B','id_grado' => 7],
            ['descripcion' => 'C','id_grado' => 7],
            ['descripcion' => 'D','id_grado' => 7],
            ['descripcion' => 'E','id_grado' => 7],
            ['descripcion' => 'A','id_grado' => 8],
            ['descripcion' => 'B','id_grado' => 8],
            ['descripcion' => 'C','id_grado' => 8],
            ['descripcion' => 'D','id_grado' => 8],
            ['descripcion' => 'A','id_grado' => 9],
            ['descripcion' => 'B','id_grado' => 9],
            ['descripcion' => 'C','id_grado' => 9],
            ['descripcion' => 'D','id_grado' => 9],
            ['descripcion' => 'E','id_grado' => 9],
            ['descripcion' => 'A','id_grado' => 10],
            ['descripcion' => 'B','id_grado' => 10],
            ['descripcion' => 'C','id_grado' => 10],
            ['descripcion' => 'D','id_grado' => 10],
            ['descripcion' => 'E','id_grado' => 10],
            ['descripcion' => 'F','id_grado' => 10],
            ['descripcion' => 'A','id_grado' => 11],
            ['descripcion' => 'B','id_grado' => 11],
            ['descripcion' => 'C','id_grado' => 11],
            ['descripcion' => 'D','id_grado' => 11],
            ['descripcion' => 'E','id_grado' => 11],
        ];

        DB::table('secciones')->insert($data);
    }
}
