<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MateriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('materias')->insert([
            'materia' => 'Economia Empresarial',
            'carrera_id' => '1',
            'anio' => '2',
            'created_at' => date('Y-m-d H:i:s'), 
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('materias')->insert([
            'materia' => 'Practica Profesional',
            'carrera_id' => '1',
            'anio' => '2',
            'created_at' => date('Y-m-d H:i:s'), 
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('materias')->insert([
            'materia' => 'Analisis Matematico I',
            'carrera_id' => '1',
            'anio' => '0',
            'created_at' => date('Y-m-d H:i:s'), 
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('materias')->insert([
            'materia' => 'Arquitectura de computadores',
            'carrera_id' => '1',
            'anio' => '0',
            'created_at' => date('Y-m-d H:i:s'), 
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('materias')->insert([
            'materia' => 'Analisis Matematico II',
            'carrera_id' => '1',
            'anio' => '1',
            'created_at' => date('Y-m-d H:i:s'), 
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('materias')->insert([
            'materia' => 'Sistemas de Informacion I',
            'carrera_id' => '1',
            'anio' => '1',
            'created_at' => date('Y-m-d H:i:s'), 
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
