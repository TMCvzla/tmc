<?php

use Illuminate\Database\Seeder;

use App\Model\General\Configuration;


class ConfigurationSeeder extends Seeder {

    /**
     *
     */
    public function run()
    {
        $list = [
            [
                'con_name' => 'Porcentaje Comisión',
                'con_code' => 'COM_TRA',
                'con_value' => 10.00,
                'con_description' => 'El porcentaje que será descontado por cada transacción.',
            ],
            [
                'con_name' => 'Comisión Pasarela',
                'con_code' => 'COM_PAS',
                'con_value' => 7.7,
                'con_description' => 'Porcentaje descontado como comisión de la pasarela usada. [Refactor]',
            ],
            [
                'con_name' => 'Comisión TMC',
                'con_code' => 'COM_TMC',
                'con_value' => 2.3,
                'con_description' => 'Porcentaje descontado como comisión de Tu Mejor Compra. [Refactor]',
            ],
            [
                'con_name' => 'IVA',
                'con_code' => 'IVA_VEN',
                'con_value' => 12,
                'con_description' => 'Impuesto vigente a la fecha [Refactor]',
            ],
        ];

        DB::table('configurations')->delete();

        foreach($list as $row){
            Configuration::create($row);
        }

    }

}

