<?php

use Illuminate\Database\Seeder;
use App\User;

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

        if(DB::table('users')->count() == 0) {
            $password = \Hash::make('123456');
            $cms_users = DB::table('users')->insert(array(
//                'id'                =>DB::table('users')->max('id')+1,
                'usu_estatus' => User::$EST_ACTIVO,
                'usu_nombre' => 'Daniel Futrille V',
                'email'             => 'futridan@gmail.com',
                'password'          => $password,
                'usu_fechacreacion'          => date('Y-m-d H:i:s'),
                'usu_fechaactualizacion'          => date('Y-m-d H:i:s'),
            ));
        }

    }

}
