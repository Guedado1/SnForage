<?php

use Illuminate\Database\Seeder;

class ConsommationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $factory=Faker\Factory::create();
    
            factory(App\Consommation::class,100)->create(["factures_id"=>null,'valeur' => $factory->randomNumber($nbDigit=5)]);
        }
    } 
    
}
