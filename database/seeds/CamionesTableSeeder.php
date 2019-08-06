<?php

use Illuminate\Database\Seeder;

class CamionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('camiones')->insert([
        	'modelo' => '3336',
        	'marca' => 'Mercedes Benz',
        	'vin' => 'ABC1234',
        	'anio' => 2008,
        	'capacidad' => 9000
        ]);

        \DB::table('asignacion')->insert([
            'id_chofer' => 1,
            'id_camion' => 1,
            'status' => 'Asignado'
        ]);

        \DB::table('camiones')->insert([
        	'modelo' => '7600 Pluma',
        	'marca' => 'International',
        	'vin' => 'ABC1235',
        	'anio' => 2012,
        	'capacidad' => 12000
        ]);

        \DB::table('camiones')->insert([
        	'modelo' => 'Columbia CL 120',
        	'marca' => 'Freightleiner',
        	'vin' => 'ABC1236',
        	'anio' => 2012,
        	'capacidad' => 7000
        ]);

        \DB::table('camiones')->insert([
        	'modelo' => '31310',
        	'marca' => 'Volkswagen',
        	'vin' => 'ABC1237',
        	'anio' => 2006,
        	'capacidad' => 8000
        ]);
    }
}
