<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExamenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('examens')->insert([
            'materia_id' => '1',
            'carrera_id' => '1',
            'anio' => '2',
            'created_at' => date('Y-m-d H:i:s'), 
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('examens')->insert([
            'materia_id' => '2',
            'carrera_id' => '1',
            'anio' => '2',
            'created_at' => date('Y-m-d H:i:s'), 
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('examens')->insert([
            'materia_id' => '3',
            'carrera_id' => '1',
            'anio' => '0',
            'created_at' => date('Y-m-d H:i:s'), 
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('examens')->insert([
            'materia_id' => '4',
            'carrera_id' => '1',
            'anio' => '0',
            'created_at' => date('Y-m-d H:i:s'), 
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('examens')->insert([
            'materia_id' => '5',
            'carrera_id' => '1',
            'anio' => '1',
            'created_at' => date('Y-m-d H:i:s'), 
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('examens')->insert([
            'materia_id' => '6',
            'carrera_id' => '1',
            'anio' => '1',
            'created_at' => date('Y-m-d H:i:s'), 
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
