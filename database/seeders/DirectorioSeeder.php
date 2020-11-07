<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DirectorioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            \DB::table('directorios')->insert([
            [
             'nombre completo' => 'Saul',
             'direccion' => 'Aguadulce,12',
             'telefono' => '666666666',
              'url_foto' => null
            ],
            [
             'nombre completo' => 'Tete',
             'direccion' => 'Aguadulce,14',
             'telefono' => '666666667',
              'url_foto' => null
            ]
        ]);
    }
}
