<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GradosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=GradosSeeder
     * @return void
     */
    public function run()
    {
        $data = [
            ['gra_descripcion' => 'Primero','niv_id' => 1],
            ['gra_descripcion' => 'Segundo','niv_id' => 1],
            ['gra_descripcion' => 'Tercero','niv_id' => 1],
            ['gra_descripcion' => 'Cuarto','niv_id' => 1],
            ['gra_descripcion' => 'Quinto','niv_id' => 1],
            ['gra_descripcion' => 'Sexto','niv_id' => 1],
            ['gra_descripcion' => 'Primero','niv_id' => 2],
            ['gra_descripcion' => 'Segundo','niv_id' => 2],
            ['gra_descripcion' => 'Tercero','niv_id' => 2],
            ['gra_descripcion' => 'Cuarto','niv_id' => 2],
            ['gra_descripcion' => 'Quinto','niv_id' => 2]
        ];

        DB::table('grado')->insert($data);
    }
}
