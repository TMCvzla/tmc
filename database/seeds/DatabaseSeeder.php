<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Please wait updating the data...');

        $this->call(UserSeeder::class);
        $this->call(PaymentsSeeder::class);
        $this->call(ConfigurationSeeder::class);

        $this->command->info('Updating the data completed !');
    }
}


