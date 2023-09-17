<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=AdminSeeder
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Administrador',
            'password' => Hash::make('admin2022'),
            'email' => 'admin@gmail.com',
            'rol_id' =>  '1',
            'estado' =>  '1',
        ]);
    }
}
