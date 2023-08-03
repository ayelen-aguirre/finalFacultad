<?php

namespace Database\Seeders;

use App\Models\Carrera;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarreraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carreras')->insert([
            'carrera' => 'Tecnicatura Superior en Analisis de Sitemas',
            'resolucion' => '5817/03',
            'created_at' => date('Y-m-d H:i:s'), 
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('carreras')->insert([
            'carrera' => 'Tecnicatura Superior en Administracion Contable',
            'resolucion' => '273/03',
            'created_at' => date('Y-m-d H:i:s'), 
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('carreras')->insert([
            'carrera' => 'Tecnicatura Superior en Administracion de Recursos Humanos',
            'resolucion' => '276/03',
            'created_at' => date('Y-m-d H:i:s'), 
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('carreras')->insert([
            'carrera' => 'Tecnicatura Superior en Logistica',
            'resolucion' => '1557/08',
            'created_at' => date('Y-m-d H:i:s'), 
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('carreras')->insert([
            'carrera' => 'Tecnicatura Superior en Gestion Ambiental y Salud',
            'resolucion' => '2257/08',
            'created_at' => date('Y-m-d H:i:s'), 
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('carreras')->insert([
            'carrera' => 'Tecnicatura Superior en Higiene y Seguridad en el Trabajo',
            'resolucion' => '320/13',
            'created_at' => date('Y-m-d H:i:s'), 
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('carreras')->insert([
            'carrera' => 'Tecnicatura Superior en Mantenimiento Industrial',
            'resolucion' => ' 3650/00',
            'created_at' => date('Y-m-d H:i:s'), 
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
