<?php

use Illuminate\Database\Seeder;

class BedsPatientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $fecha = date('Y/m/d');
      for ($i=0; $i < 20; $i++) {
        $up_date = strtotime ( "+".rand(1,31)." day" , strtotime ( $fecha ) ) ;
        $up_date = date ( 'Y/m/d' , $up_date);

        $down_date = strtotime ( "+".rand(30,500)." day" , strtotime ( $fecha ) ) ;
        $down_date = date ( 'Y/m/d' , $down_date );
        DB::table('bed_patient')->insert([
          'bed_id' => rand(1,20),
          'patient_id' => rand(1,20),
          'up_date' => $up_date,
          'down_date' => $down_date
        ]);
      }
    }
}
