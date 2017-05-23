<?php

use Illuminate\Database\Seeder;
use BuscoMoto\Usuario;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$user = Usuario::create
            (
                    [
                    'nombre' => 'admin',
                    'apellido' => 'admin',
                    'email' => 'admin@admin.com',
                    'url_foto_perfil' => '/public/images/avatar_admin.jpg',
                    'password' => bcrypt('admin'),
                    'tipo' => 'admin',
                    'fecha_nacimiento' => '1990-01-01' 
                    ]
            );
    }
}
