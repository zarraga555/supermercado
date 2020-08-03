<?php

use App\Cargo;
use Illuminate\Database\Seeder;

class cargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Cargo::create([
        'nombre' 				=>	'Gerente',
        'descripcion'		=>	'Gerente.',
      ]);

      Cargo::create([
        'nombre' 				=>	'Responsable de sección',
        'descripcion'		=>	'Responsable de sección',
      ]);

      Cargo::create([
        'nombre' 				=>	'Empleados de sección',
        'descripcion'		=>	'Empleados de sección',
      ]);

      Cargo::create([
        'nombre' 				=>	'Reponedores',
        'descripcion'		=>	'Reponedores',
      ]);

      Cargo::create([
        'nombre' 				=>	'Cajeros',
        'descripcion'		=>	'Cajeros',
      ]);

      Cargo::create([
        'nombre' 				=>	'Almacen',
        'descripcion'		=>	'Almacen',
      ]);
    }
}
