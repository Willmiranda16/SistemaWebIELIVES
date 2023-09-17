<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NivelesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=NivelesSeeder
     * @return void
     */
    public function run()
    {
        $data = [
            ['niv_descripcion' => 'Primaria'],
            ['niv_descripcion' => 'Secundaria']
        ];

        DB::table('nivel')->insert($data);
    }
}
