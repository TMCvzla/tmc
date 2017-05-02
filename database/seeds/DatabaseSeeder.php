<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Cliente;
use App\Pago;
use App\Model\PagoHistorico;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->command->info('Please wait updating the data...');

        $this->call('Tmc_usersSeeder');

        $this->command->info('Updating the data completed !');
    }
}

class Tmc_usersSeeder extends Seeder {

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
        $products = [
            'Caja de Naranjas','Mandarinas','Cambures','Pepitos','Monitor 17 Pulgadas','Teclado','Mouse Optico',
            'Mueble Decorativo','Moto','Laptod','Almuerzo','Desayuno','Cena','Disco Duro','Celular Inteligente',
            'Impresora Multifuncional','Charcutería','Queso Amarillo','Jamon Ahumado','Galletas','Pollo Entero',
        ];

        $nombres = [
            'Martin','María','Andrea','Martha','Andres','Carlos','Miguel','Karla','Mercedes','Milagros',
            'Daniela','Freddy','Jhony','Wikelan','Yefferson','Yuleidy','Lola','Sinibaldo','Marina','Eduardo',
            'Luis','Migueangel',
        ];

        $apellidos = [
            'Martinez','Espinal','Perez','Fernandez','Futrille','Arcia','Maldonado','Perozo','Rodriguez','Garcia',
            'Rojas','Coronado','Lopez','Vega','Paredes','Romero','Leon','Flores','Viera','Arguello','Villasmil',
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
        $users = DB::table('users')->get();
        foreach($users as $usu){
            for ($i = 0; $i < rand(5,20); $i++){
                $payment = Pago::create([
                    'usu_id' => $usu->usu_id,
                    'pag_estatus' => Pago::$EST_PORPROCESAR,
                    'pag_monto' => (rand(1,100)).(intval(rand(1,99)/10)*10).(intval(rand(10,99)/100)*100),
                    'pag_concepto' => $products[rand(0,sizeof($products)-1)],
                    'pag_nombretc' => $nombres[rand(0,sizeof($nombres)-1)].' '.$apellidos[rand(0,sizeof($apellidos)-1)],
                    'pag_cith' => rand(3, 20).rand(100000, 999999),
                    'pag_fechacreacion' => date('Y-m-'.rand(1,30).' '.rand(1,23).':i:s'),
                ]);

                $pgh = PagoHistorico::create([
                    'pag_id' => $payment->pag_id,
                    'pgh_columna' => 'pag_estatus',
                    'pgh_valor' => $payment->pag_estatus,
                    'usu_id' => $usu->usu_id,
                ]);
            }
        }



    }

}

