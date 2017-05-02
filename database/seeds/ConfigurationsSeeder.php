<?php

use Illuminate\Database\Seeder;

use App\Model\General\Configuracion;


class ConfigurationSeeder extends Seeder {

    /**
     *
     */
    public function run()
    {
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

        $nombresJuridicos = [
            'Q AREPAS C.A.','INVERSIONES ELEFANTE','EMPORIO CHACAITO','CREDIX SA','PASTELERIA EL PANAL','PC ACTUAL',
            'LT 2015','CALLE NICATA CA','SUPERMERCADO EL CHINITO','PANADERIA TRUFFAS','JUANCHO\'S BURGUER',
            'COMIDA RAPIDA EL PLAYERO','ARCOS DORADOS DE VENEZUELA','LOCATEL CA','FARMATODO CA',
        ];

        DB::table('pagos')->delete();

        $users = DB::table('users')->get();
        foreach($users as $usu){
            for ($i = 0; $i < rand(5,30); $i++){

                $isNatural = rand(0,1) == 0 ? 'V' : 'J';

                $payment = Pago::create([
                    'usu_id' => $usu->usu_id,
                    'pag_estatus' => Pago::$EST_PORPROCESAR,
                    'pag_monto' => (rand(1,100)).(intval(rand(1,99)/10)*10).(intval(rand(10,99)/100)*100),
                    'pag_concepto' => $products[rand(0,sizeof($products)-1)],
                    'pag_nombretc' => (
                        $isNatural == 'V' ?
                        $nombres[rand(0,sizeof($nombres)-1)].' '.$apellidos[rand(0,sizeof($apellidos)-1)] :
                        $nombresJuridicos[rand(0,sizeof($nombresJuridicos)-1)]),
                    'pag_cith' => $isNatural . rand(3, 20) . rand(100000, 999999) . ($isNatural == 'V' ? '' : rand(0,9)),
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

