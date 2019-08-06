<?php

use Illuminate\Database\Seeder;

class ChoferesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('choferes')->insert([
        	'nombres' => 'Francisco',
        	'apellidos' => 'Carpio',
        	'rut' => '123456789',
        	'edad' => 30,
        	'genero' => 'Masculino',
        	'licencia' => 'Si',
        	'certificado' => 'Si'
        ]);

        \DB::table('choferes')->insert([
        	'nombres' => 'Pedro',
        	'apellidos' => 'Martin',
        	'rut' => '123456780',
        	'edad' => 25,
        	'genero' => 'Masculino',
        	'licencia' => 'Si',
        	'certificado' => 'Si'
        ]);

        \DB::table('choferes')->insert([
        	'nombres' => 'Angel',
        	'apellidos' => 'Camacho',
        	'rut' => '123456781',
        	'edad' => 45,
        	'genero' => 'Masculino',
        	'licencia' => 'Si',
        	'certificado' => 'Si'
        ]);
    }
}
