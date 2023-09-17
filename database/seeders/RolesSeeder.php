<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=RolesSeeder
     * @return void
     */
    public function run()
    {
        $data = [
            ['rol_descripcion' => 'Administrador','rol_estado' => 1]
        ];

        DB::table('roles')->insert($data);
    }
}
