<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Cliente;

class UserSeeder extends Seeder {

    /**
     *
     */
    public function run()
    {
        $nuevos = [
            ['nombre' => 'Daniel Futrille', 'email' => 'futridan@gmail.com'],
            ['nombre' => 'Administrador', 'email' => 'admin@gmail.com'],
            ['nombre' => 'Procesador Pagos', 'email' => 'procesador@gmail.com'],
        ];

        if(DB::table('users')->count() == 0) {
            foreach ($nuevos as $nuevo){
                $user = User::create([
                    'usu_estatus' => User::$EST_ACTIVO,
                    'usu_nombre' => $nuevo['nombre'],
                    'email' => $nuevo['email'],
                    'password' => \Hash::make('123456'),
                ]);

                Cliente::create([
                    'cli_nombre' => $user->usu_nombre,
                    'cli_ci' => 'V' . rand(14, 19) . rand(100000, 999999),
                    'cli_email' => $user->email,
                    'usu_id' => $user->usu_id,
                    'cli_direccionfiscal' => 'Dirección Fiscal',
                    'cli_direccionenvio' => 'Dirección de envio para prueba',
                    'cli_banco' => 'Banco Mercantil',
                    'cli_nrocuenta' => rand(10000, 99999) . rand(10000, 99999) . rand(10000, 99999) . rand(10000, 99999),
                    'cli_tipocuenta' => rand(1, 2),
                ]);
            }
        }
    }

}

